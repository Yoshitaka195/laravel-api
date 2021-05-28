up:
	docker-compose build
	docker-compose up -d

exec:
	docker exec -it laravel_api_php bash

in:
	docker-compose up -d
	docker exec -it laravel_api_php bash

down:
	docker-compose down

db:
	docker exec -it laravel_api_db bash -p