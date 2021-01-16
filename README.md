# Strict Objects for PHP 🌻

![PHP tests](https://github.com/smuuf/php-strict-object/workflows/PHP%20tests/badge.svg)

Avoid annoying problems caused by PHP being too lax when dealing with undeclared object properties. Let's be more strict. Don't let typos in property names ruin your day ever again. 🌞

## Installation
```bash
composer require smuuf/strict-object
```

## Usage

Simple, just `use` the `\Smuuf\StrictObject` trait in your class to make it strict - and to **throw `\LogicException`** when someone tries to **read** or to **write** to an **undeclared property**.

```php
<?php

use \Smuuf\StrictObject;

require __DIR__ . '/../bootstrap.php';

class Whatever {

	use StrictObject;

	public $someProperty;

}

$obj = new Whatever;

$obj->someProperty = 1; // Ok.
echo $obj->someProperty; // Ok.

// But - and hold on to your hats...

$obj->bogusProperty = 1; // Throws \LogicException.
echo $obj->bogusProperty; // Throws \LogicException.

```
