#!/bin/bash

cd `git rev-parse --show-toplevel`

read -e -p "Before you begin make sure you have added each of the plugin license keys in the .env file." check

cp -n docker/env-example .env || true

source ./.env

# Check if an environment variable ACF_PRO_KEY is set
if [ -z "$ACF_PRO_KEY" ]; then
    echo "You need to set the ACF_PRO_KEY environment variable in your .env file."
    exit 1
fi
# Check if an environment variable GRAVITY_FORMS_KEY is set
if [ -z "$GRAVITY_FORMS_KEY" ]; then
    echo "You need to set the GRAVITY_FORMS_KEY environment variable in your .env file."
    exit 1
fi



## Setup a local environment

ln -sf docker/docker-compose.yml docker-compose.yml

docker-compose up -d

echo "Installing packages via composer"
docker-compose exec -T php composer install
docker-compose exec -T -w /var/www/html/web/app/themes/custom php composer install

echo "Giving the database some time to get revvvv'd up"
sleep 10

docker-compose exec --workdir=/var/www/html/web php wp core install --url=${PROJECT_BASE_URL} --title="${PROJECT_TITLE}" --admin_user=${WORDPRESS_USER} --admin_email=${WORDPRESS_EMAIL} --admin_password=${WORDPRESS_PASSWORD} --skip-email
docker-compose exec --workdir=/var/www/html/web php wp plugin activate --all
docker-compose exec --workdir=/var/www/html/web php wp theme activate custom

echo "Login at"
echo "${WP_HOME}/wp/wp-admin"
echo "Username: localuser"
echo "Password: localuser"
echo "Monitor email at:"
echo "http://mailhog.${PROJECT_BASE_URL}"
echo "PHPMyAdmin:"
echo "http://pma.${PROJECT_BASE_URL}"
