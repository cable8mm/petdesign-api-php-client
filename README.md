# Unofficial Petdesign API PhpClient

[![StyleCI](https://github.styleci.io/repos/138573135/shield?branch=master)](https://github.styleci.io/repos/138573135)
[![Build Status](https://travis-ci.org/cable8mm/petdesign-api-php-client.svg?branch=master)](https://travis-ci.org/cable8mm/petdesign-api-php-client)

## About

This HttpClient used for connecting PETDESIGN API System.

It must required **KEY**.

## Install

```
composer require esc-company/petdesign-api-client
```

## Usage

## Lookup Petdesign Goods

You can use two method for fetch goods information.

They are `find()` and `get()`. `find` for **one** good information and `get` for goods information **list**.

```php
<?php

$good = (new Good({api_key}))->find(30);
$goods = (new Good({api_key}))->show(false)->get();
$goods = (new Good({api_key}))->page(1)->tag('긴급소진')->get();
$goods = (new Good({api_key}))->tag('긴급소진')->get();
$goods = (new Good({api_key}))->from('2019-09-01')->get();
```

We suggsest Fasade class for your convinient. As soon...

## License

The Phpunit Start Kit is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
