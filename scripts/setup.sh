#!/bin/bash

time_started = `date +"%s"`


# If not run as root, run as root
if [ "$EUID" -ne 0 ]
  then echo "Please run as root"
  # run current script as root
  sudo sh setup.sh
  exit
fi

# Get the os base 
os=$(lsb_release -si | tail -n 1)
if ( [ "$os" != "Ubuntu" || "$os" != "Debian" ] )
then
  echo "This script works best and is tested on Ubuntu"
  exit
fi


# Get variable setup values from user
echo "Enter the port you want to use for the website (default 80):"
read port
if [ -z "$port" ]
then
  port=80
fi


read -p "Enter the MySQL username you want to use:" mysql_user
read -s -p "Enter the MySQL password you want to use:" mysql_password
read -p "Enter the key for cloudflared (found on the page to configure the tunnel; found after $ cloudflared service install):" cloudflareKey

if [ "$isProduction" == "y" ]
then
  echo "Setting up production server..."
  rm /etc/hostname
  echo "bsarmy.com" > /etc/hostname
else 
  echo "Setting up development server..."
  rm /etc/hostname
  echo "dev.bsarmy.com" > /etc/hostname
else 
  echo "Invalid input. Please enter y or n"
  read -p "Is this a production server? (y/n):" isProduction
  if [ "$isProduction" == "y" ]
	then
		echo "Setting up production server..."
		rm /etc/hostname
		echo "bsarmy.com" > /etc/hostname
	else 
		echo "Setting up development server..."
		rm /etc/hostname
		echo "dev.bsarmy.com" > /etc/hostname
	else 
		echo "Invalid input, keeping current hostname $(hostname)"
	fi
fi

# Install dependencies
apt-get update
apt-get install -y apache2 php mysql-server mysql php-mysql php-curl curl wget git ufw imagemagick
echo "--- 1: Installed dependencies..."

# --- Install and configure cloudflared
curl -L --output cloudflared.deb https://github.com/cloudflare/cloudflared/releases/latest/download/cloudflared-linux-amd64.deb
sudo dpkg -i cloudflared.deb
sudo cloudflared service install "$cloudflareKey"
echo "--- 2: Installed cloudflared and configured tunnel..."

# --- Enable and configure firewall
ufw enable
#  Add port to firewall
ufw allow "$port"/tcp
echo "--- 3: Enabled firewall and allowed port $port..."


# --- Configure Apache
a2enmod rewrite
sed -i "s/localhost:80/localhost:$port/g" bsarmy.com.conf
cp bsarmy.com.conf /etc/apache2/sites-available/bsarmy.com.conf
a2ensite bsarmy.com.conf

# Set some basic security settings
sed -i /etc/apache2/conf-available/security.conf -e's/ServerTokens OS/ServerTokens Prod/g'
sed -i /etc/apache2/conf-available/security.conf -e's/ServerSignature On/ServerSignature Off/g'
sed -i /etc/apache2/conf-available/security.conf -e's/TraceEnable On/TraceEnable Off/g'
sed -i /etc/apache2/conf-available/security.conf -e's/#RedirectMatch 404 /\.git/RedirectMatch 404 /\.git/g'
sed -i /etc/apache2/conf-available/security.conf -e 's/#Header set X-Content-Type-Options: "nosniff"/Header set X-Content-Type-Options: "nosniff"/g'
sed -i /etc/apache2/conf-available/security.conf -e 's/#Header set Content-Security-Policy "frame-ancestors 'none'"/Header set Content-Security-Policy "frame-ancestors 'none'"/g'

# Enable mod_headers
a2enmod headers

#  Allow apache to listen on $port
sed -i "s/Listen 80/Listen 80\nListen $port /g" /etc/apache2/ports.conf
echo "Listening on port $port on localhost"
service apache2 restart
echo "--- 4: Configured and resetarted Apache Web Server..."

# Configure PHP
sed -i 's/;extension=curl/extension=curl/g' /etc/php/*/apache2/php.ini
sed -i 's/;extension=pdo_mysql/extension=pdo_mysql/g' /etc/php/*/apache2/php.ini
sed -i 's/;session.save_path = "/var/lib/php/sessions"/session.save_path = "/var/lib/php/sessions"/g' /etc/php/*/apache2/php.ini

# Configure MySQL
mysql -u root -e "CREATE USER '$mysql_user'@'localhost' IDENTIFIED BY '$mysql_password';"
mysql -u root -e "GRANT SELECT, INSERT, UPDATE, DELETE ON 'bsarmy_main'.'localhost' TO '$mysql_user'@'localhost';"
mysql -u root -e "FLUSH PRIVILEGES;"
mysql -u root > mysql_build_files/bsarmy_main.sql
echo "--- 5: Configured MySQL and imported database..."

# get the latest source code
git clone --recurse-submodules https://github.com/lucasburlingham/bsarmy.com.git /var/www/bsarmy.com
echo "--- 5: Cloned bsarmy.com into /var/www/bsarmy.com with submodules..."

# set permissions
chown -R www-data:www-data /var/www
echo "Set permissions for /var/www"
chown -R lburlingham bsarmy.com/
chown -R www-data ^C
chgrp www-data bsarmy.com/
chmod -R 750 bsarmy.com/
chmod g+s bsarmy.com/

echo "--- 6: Set permissions for /var/www/bsarmy.com..."

# set up cron jobs https://unix.stackexchange.com/a/348716
sudo crontab -l | cat - cron.tab >/tmp/crontab.txt && crontab /tmp/crontab.txt
echo "--- 7: Set up cron jobs..."



time_ended = `date +"%s"`
time_elapsed = $((time_ended - time_started))
echo "Setup completed in $time_elapsed seconds"

