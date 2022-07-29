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

#
#cache-clear:
#	docker-compose run --rm cli php artisan optimize:clear
#
#m-r-s:
#	docker-compose run --rm cli php artisan migrate:refresh --seed
#
#psalm:
#	docker-compose run --rm cli ./vendor/bin/psalm
#
#watch:
#	docker-compose run --rm node-cli npm run watch
#
#lint:
#	docker-compose run --rm cli composer php-cs-fixer fix -- --dry-run --diff
#
#fix:
#	docker-compose run --rm cli composer php-cs-fixer fix
#
#mix-prod:
#	docker-compose run --rm node-cli npm run production
