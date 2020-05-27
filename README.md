# Unofficial Petdesign API PhpClient

[![StyleCI](https://github.styleci.io/repos/138573135/shield?branch=master)](https://github.styleci.io/repos/138573135)
[![Build Status](https://travis-ci.org/cable8mm/petdesign-api-php-client.svg?branch=master)](https://travis-ci.org/cable8mm/petdesign-api-php-client)
![PHP Composer](https://github.com/cable8mm/petdesign-api-php-client/workflows/PHP%20Composer/badge.svg)

## About

This HttpClient used for connecting PETDESIGN API System.

It must required **KEY**.

## Install

```
composer require cable8mm/petdesign-api-php-client
```

## Usage

## Lookup Petdesign Goods

```php
<?php

$good = (new Good())->find(30);
$goods = (new Good())->find()->show(false)->get();
$goods = (new Good())->find()->page(1)->tag('긴급소진')->get();
$goods = (new Good())->find()->tag('긴급소진')->get();
$goods = (new Good())->all()->from('2019-09-01')->get();
```

## License

The Phpunit Start Kit is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
