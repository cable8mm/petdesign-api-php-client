# Unofficial Petdesign API PhpClient

## About

This HttpClient used for connecting PETDESIGN API System.

It must required **KEY**.

## Install

```
composer require cable8mm/petdesign-api-php-client
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
