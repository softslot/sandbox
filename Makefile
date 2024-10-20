init: docker-down-clear docker-pull docker-build docker-up composer-install

docker-down-clear:
	docker compose down -v --remove-orphans

docker-pull:
	docker compose pull

docker-build:
	docker compose build

docker-up:
	docker compose up -d

composer-install:
	docker compose run --rm app composer install

cli:
	docker compose exec app ./bin/cli
