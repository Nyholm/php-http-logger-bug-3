# Test for bug in php-http

Issue: https://github.com/php-http/logger-plugin/issues/3

### Run

```
# Install docker and stuff first

# Then..
./configure
docker-compose up -d
docker-compose exec docker docker pull debian
./docker-console
composer install
php bin/test.php
```
