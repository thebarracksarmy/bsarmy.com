#!/bin/bash

# Install dependencies (ntfy)
wget https://github.com/binwiederhier/ntfy/releases/download/v2.8.0/ntfy_2.8.0_linux_amd64.deb
sudo dpkg -i ntfy_*.deb
sudo systemctl enable ntfy
sudo systemctl start ntfy

# Append to ntfy config
sudo echo "listen-http: \"localhost:2831\"" >> /etc/ntfy/server.yml
sudo echo "base-url: \"https://messages.bsarmy.com\"" >> /etc/ntfy/server.yml
sudo echo "auth-file: \"/var/lib/ntfy/user.db\"" >> /etc/ntfy/server.yml
sudo echo "auth-default-access: \"deny-all\"" >> /etc/ntfy/server.yml

ntfy user add --role=admin <username>