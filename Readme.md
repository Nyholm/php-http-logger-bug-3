# Test for bug in php-http

Issue: https://github.com/php-http/logger-plugin/issues/3

### Run

```
# Install docker and stuff first

# Then..
docker-compose build
docker-compose up -d
docker-compose exec docker docker pull debian
docker-compose exec console composer install
docker-compose exec console php bin/test.php
```
