#!/bin/bash

echo "Running DB migrations and seeding"

until mysql -h db -u $DB_USERNAME -p$DB_PASSWORD -D $DB_DATABASE --silent -e "show databases;"
do
  echo "Waiting for db..."
  sleep 5
done

php artisan migrate --seed
