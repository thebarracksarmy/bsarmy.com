#!/bin/bash

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


# Install dependencies
apt-get update
apt-get install -y apache2 php mysql-server mysql php-mysql git ufw

#  Install cloudflared
curl -L --output cloudflared.deb https://github.com/cloudflare/cloudflared/releases/latest/download/cloudflared-linux-amd64.deb
sudo dpkg -i cloudflared.deb
sudo cloudflared service install $cloudflareKey


# Enable firewall
ufw enable
#  Add port to firewall
ufw allow $port/tcp


# Configure Apache
a2enmod rewrite
sed -i "s/localhost:80/localhost:$port/g" bsarmy.com.conf
cp bsarmy.com.conf /etc/apache2/sites-available/bsarmy.com.conf
a2ensite bsarmy.com.conf
service apache2 restart

#  Allow apache to listen on $port
sed -i "s/Listen 80/Listen 80\nListen $port /g" /etc/apache2/ports.conf

# get the latest source code
git clone https://github.com/lucasburlingham/bsarmy.com.git /var/www/bsarmy.com

# set permissions
chown -R www-data:www-data /var/www
