# DEPLICATED
This code transfered to `esc-company/petdesign-api-client`

Don't hesitate to visit https://github.com/esc-company/petdesign-api-client

# Unofficial Petdesign API PhpClient

[![Latest Stable Version](http://poser.pugx.org/esc-company/petdesign-api-client/v)](https://packagist.org/packages/esc-company/petdesign-api-client)
[![Total Downloads](http://poser.pugx.org/esc-company/petdesign-api-client/downloads)](https://packagist.org/packages/esc-company/petdesign-api-client)
[![StyleCI](https://github.styleci.io/repos/267242299/shield?branch=master)](https://github.styleci.io/repos/267242299)
[![Build](https://github.com/esc-company/petdesign-api-client/actions/workflows/php.yml/badge.svg)](https://github.com/esc-company/petdesign-api-client/actions/workflows/php.yml)
[![License](http://poser.pugx.org/esc-company/petdesign-api-client/license)](https://packagist.org/packages/esc-company/petdesign-api-client)

## About

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
composer run test
```

## License

The Unofficial Petdesign API PhpClient is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
