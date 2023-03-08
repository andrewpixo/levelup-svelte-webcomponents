#!/bin/bash

cd /var/www/html
source ./.env

DOCKER="docker-compose -f docker-compose-production.yml"

$DOCKER exec --workdir=/var/www/html/web php wp db reset --yes
$DOCKER exec --workdir=/var/www/html/web php wp core install --url=${PROJECT_BASE_URL} --title="${PROJECT_TITLE}" --admin_user=${WORDPRESS_USER} --admin_email=${WORDPRESS_EMAIL} --admin_password=${WORDPRESS_PASSWORD} --skip-email
$DOCKER exec --workdir=/var/www/html/web php wp plugin activate --all
$DOCKER exec --workdir=/var/www/html/web php wp theme activate custom

