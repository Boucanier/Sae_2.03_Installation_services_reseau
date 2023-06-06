#! /bin/bash

yum install httpd
yum install mysql-server
yum install php
yum install php-mysqli
yum install php-gd

systemctl start mysqld.service
systemctl start firewalld.service

firewall-cmd --zone=public --add-service=http
