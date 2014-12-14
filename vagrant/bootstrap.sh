#!/bin/bash

sudo chown www-data:www-data /home/vagrant/app

sudo apt-get -q -y --force-yes install python-software-properties
sudo apt-get -q -y --force-yes install software-properties-common



#PHP5
sudo add-apt-repository ppa:thefrontiergroup/vsftpd
sudo add-apt-repository ppa:ondrej/php5
sudo apt-get update

sudo apt-get -q -y --force-yes upgrade php5
sudo apt-get  -q -y --force-yes  install php5-pgsql
sudo apt-get  -q -y --force-yes  install php5-gd

sudo cp -f /home/vagrant/app/vagrant/configs/dev/apache2_php.ini /etc/php5/apache2/php.ini

sudo apt-get -q -y --force-yes install php-apc

sudo service apache2 restart
#PHP5 END

#FTP
sudo apt-get  -q -y --force-yes install vsftpd

sudo mkdir /var/ftp
sudo mkdir /var/ftp/pub

sudo chmod a-w /var/ftp
sudo chmod -R 777 /var/ftp/pub

sudo usermod -a -G ftp vagrant
sudo usermod -a -G www-data vagrant

sudo cp  -f /home/vagrant/app/vagrant/configs/dev/vsftpd.conf /etc/vsftpd.conf
sudo service vsftpd restart
sudo service apache2 restart
#FTP END

#APACHE
sudo cp  -f /home/vagrant/app/vagrant/configs/dev/apache2.default /etc/apache2/sites-enabled/000-default.conf
sudo cp  -f /home/vagrant/app/vagrant/configs/dev/localftp /etc/apache2/sites-available/localftp.conf
sudo cp -f /home/vagrant/app/vagrant/configs/dev/apache2.conf /etc/apache2/apache2.conf
sudo sed -i ':z;s/\(Options.*\) \([^+_-]\)/\1 +\2/;tz' /etc/apache2/sites-available/*
sudo a2ensite localftp
sudo chown -R www-data:www-data /var/ftp/pub
sudo chmod a-w /var/ftp
sudo chmod -R 777 /var/ftp/pub
sudo service apache2  restart
#APACHE END

#APP SETTINGS
cd /home/vagrant/app && mkdir ../settings && sudo cp ./protected/config/local-example.php ../settings/local.php
sudo cp ./protected/config/local-example.php ../settings/local.php

sudo apt-get install -q -y --force-yes php5-gd

echo "VAGRANT PROVISION - DONE!!!"
echo "NEXT YOU NEED RUN ./make "
echo "Goodluck"

