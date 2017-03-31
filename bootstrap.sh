#!/bin/bash
set -e

curl -fsSL https://github.com/memiux/cloud/tarball/master | tar --strip 1 -xzC $(mkdir -p ~/.cloud; echo $_)

# su vagrant -c 'cd /vagrant && composer.phar -vv install'

mysql -u root -p123 -e "CREATE DATABASE IF NOT EXISTS litecart CHARACTER SET utf8 COLLATE utf8_general_ci;"
# service mysql restart

# /usr/local/sbin/php-fpm --nodaemonize
# /usr/local/bin/httpd -D NO_DETACH
# tail -f /var/log/syslog /var/log/upstart/*.log /var/log/mysql/error.log /tmp/*.log /vagrant/public_html/data/*.log
