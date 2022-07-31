d-up:
	docker-compose up -d

d-down:
	docker-compose down

d-build:
	docker-compose up --build -d

d-down-clear:
	docker-compose down -v --remove-orphans

m-r-s:
	docker-compose run --rm backend yii  migrate/down all --interactive=0
	docker-compose run --rm backend yii migrate --interactive=0
	docker-compose run --rm backend yii fixture/load "*" --namespace='common\fixtures' --interactive=0

psalm:
	docker-compose run --rm backend ./vendor/bin/psalm

lint:
	docker-compose run --rm backend composer php-cs-fixer fix -- --dry-run --diff

fix:
	docker-compose run --rm backend composer php-cs-fixer fix