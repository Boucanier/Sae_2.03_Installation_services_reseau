#! /bin/bash

yum install httpd mysql-server php php-pdo php-gd

systemctl start mysqld.service
systemctl start firewalld.service

firewall-cmd --zone=public --add-service=http

mv ../Sae_2.03_Installation_services_reseau-main ../S203
mv ../S203 /var/www/html/

mysql -e "source /var/www/html/S203/creation_s203.sql"
