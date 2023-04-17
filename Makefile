install:
	cp -n .env.local .env
	cp -n docker-compose.dev.yml docker-compose.override.yml
	docker compose up -d --build
	docker compose exec php chown -R www-data:www-data bootstrap/ storage/
	docker compose exec php composer install
	docker compose exec php service supervisor start

test:
	docker compose exec php composer check
