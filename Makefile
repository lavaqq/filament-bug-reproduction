setup:
	cp .env.example .env
	sed -i '' 's/mysql/sqlite/g' .env
	sed -i '' '/DB_HOST=127\.0\.0\.1/d; /DB_PORT=3306/d; /DB_DATABASE=laravel/d; /DB_USERNAME=root/d; /DB_PASSWORD=/d' .env
	composer i
	npm i
	php artisan key:gen
	php artisan migrate --seed --force
	php artisan user:create --dev