### TQ Planner

![version](https://img.shields.io/badge/version-0.0.2-blue.svg)
![coverage](https://img.shields.io/badge/coverage-100%25-green.svg)
![php](https://img.shields.io/badge/php-%5E8.0-blue.svg)

## Setup

### Development

Bring up the development environment using docker:

```bash
$ composer install

$ docker-compose up -d
```

### Tests

```bash
$ docker-compose exec tq-api-fpm composer run tests
```

### Code Quality Check

```bash
$ docker-compose exec tq-api-fpm composer php-cs-fixer
```

### Technologies ###

* Language: Php (Symfony)
* DB: Mysql
* Docker
