# Unofficial Petdesign API PhpClient

![GitHub Release](https://img.shields.io/github/v/release/cable8mm/petdesign-api-php-client?logo=packagist&color=F28D1A)
![Packagist Downloads](https://img.shields.io/packagist/dt/esc-company/petdesign-api-client?logo=packagist&color=F28D1A)
![minimum PHP version](https://img.shields.io/badge/php-%3E%3D_8.0-8892BF.svg?logo=php)
![GitHub License](https://img.shields.io/github/license/cable8mm/petdesign-api-php-client)

## About

🔥 **The Server API is deprecated, so this repository has been archived.** 🔥

This HttpClient used for connecting PETDESIGN API System.

It must required **KEY**.

## Install

```
composer require esc-company/petdesign-api-client
```

## Usage

## Lookup Petdesign Goods and Categories

You can use two method for fetch goods information.

They are `find()` and `get()`. `find` for **one** good information and `get` for goods information **list**.

```php
<?php

// Goods
$good = (new Good({api_key}))->find(30);
$goods = (new Good({api_key}))->show(false)->get();
$goods = (new Good({api_key}))->page(1)->get();
$goods = (new Good({api_key}))->from('2019-09-01')->get();

// Categories
$categories = (new Category({api_key}))->get();
$categories = (new Category({api_key}))->byCat()->get();
$catCategory = (new Category({api_key}))->find(Category::catCode);
```

We suggsest Fasade class for your convinient. As soon...

## Test

```bash
composer test
```

## License

The Unofficial Petdesign API PhpClient is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
