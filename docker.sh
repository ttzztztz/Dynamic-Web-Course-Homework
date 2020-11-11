docker run -d -p 8086:80 --name php_app -v "$PWD":/var/www/html php:7.3-apache-stretch
docker exec -it php_app docker-php-ext-install pdo pdo_mysql # PDO Configure