#! /bin/bash

yum install httpd
yum install mysql-server
yum install php
yum install php-mysqli
yum install php-gd

systemctl start mysqld.service
systemctl start firewalld.service

firewall-cmd --zone=public --add-service=http

mv ../Sae_2.03_Installation_services_reseau_main ../S203
mv ../S203 /var/www/html/

mysql -e "source /var/www/html/S203/creation_s203.sql"
