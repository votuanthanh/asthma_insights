#!/bin/sh

printf "Checking database connection...\n\n"
mysql_ready() {
    mysqladmin ping --host=mysql --user=root --password=$MYSQL_ROOT_PASSWORD > /dev/null 2>&1
}

while !(mysql_ready)
do
    sleep 3
    echo "Waiting for database connection ..."
done

printf "Upgrading database...\n\n"
./yii migrate/up

printf "Starting php-fpm daemon...\n\n"
php-fpm --daemonize

set -e
printf "Starting nginx...\n\n"
nginx -g "daemon off;"
