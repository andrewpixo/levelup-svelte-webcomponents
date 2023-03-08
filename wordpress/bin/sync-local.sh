#!/bin/bash

cd `git rev-parse --show-toplevel`

source .env

git pull --prune

cd web/app/themes/custom
npm install
npm run dev
cd `git rev-parse --show-toplevel`

docker-compose up -d
docker-compose exec --workdir=/var/www/html php composer install
docker-compose exec --workdir=/var/www/html/web/app/themes/custom php composer install
docker-compose exec --workdir=/var/www/html/web php wp core update-db
docker-compose exec --workdir=/var/www/html/web php wp plugin activate query-monitor
docker-compose exec --workdir=/var/www/html/web php wp rewrite flush
