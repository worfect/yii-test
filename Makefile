d-up:
	docker-compose up -d

d-down:
	docker-compose down

d-build:
	docker-compose up --build -d

d-down-clear:
	docker-compose down -v --remove-orphans

m-r-s:
	docker-compose run --rm api-admin yii  migrate/down all --interactive=0
	docker-compose run --rm api-admin yii migrate --interactive=0
	docker-compose run --rm api-admin yii fixture/load "*" --namespace='common\fixtures' --interactive=0

psalm:
	docker-compose run --rm api-admin ./vendor/bin/psalm

lint:
	docker-compose run --rm api-admin composer php-cs-fixer fix -- --dry-run --diff

fix:
	docker-compose run --rm api-admin composer php-cs-fixer fix