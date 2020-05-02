# Slash

[![Build Status](http://img.shields.io/travis/masterfermin02/slash.svg?style=flat)](https://travis-ci.org/masterfermin02/slash)
[![Latest Stable Version](http://img.shields.io/packagist/v/masterfermin02/slash.svg?style=flat)](https://packagist.org/packages/masterfermin02/slash)
[![Total Downloads](http://img.shields.io/packagist/dt/masterfermin02/slash.svg?style=flat)](https://packagist.org/packages/masterfermin02/slash)
[![codecov](https://codecov.io/gh/masterfermin02/slash/branch/master/graph/badge.svg)](https://codecov.io/gh/masterfermin02/slash)

A functional library for PHP programmers, similar to Ramdajs.

## Why Slash?

There are already several excellent libraries with a functional flavor. Typically, they are meant to be general-purpose toolkits, suitable 
for working in multiple paradigms. Slash has a more focused goal. We wanted a library designed specifically for a functional programming style, 
one that makes it easy to create functional pipelines, one that never mutates user data.

## What's Different?
The primary distinguishing features of slash are:

Slash emphasizes a purer functional style. Immutability and side-effect free functions are at the heart of its design philosophy. This can help you get the job done with simple, elegant code.

Slash functions are automatically curried. This allows you to easily build up new functions from old ones simply by not supplying the final parameters.

The parameters to Slash functions are arranged to make it convenient for currying. The data to be operated on is generally supplied last.

The last two points together make it very easy to build functions as sequences of simpler functions, each of which transforms the data and passes it along to the next. Slash is designed to support this style of coding.

## Install
Requires PHP 7.1+
```bash
composer require masterfermin02/slash
```

## Usage
Slash operations are pure functions that can be used alone.

## Functionality
A small usage example for the groupBy function:
```php
<?php

use function Slash\groupBy;

$records = [
     ['id' => 1, 'value1' => 5, 'value2' => 10],
     ['id' => 2, 'value1' => 50, 'value2' => 100],
     ['id' => 1, 'value1' => 2, 'value2' => 2],
     ['id' => 2, 'value1' => 15, 'value2' => 20],
     ['id' => 3, 'value1' => 15, 'value2' => 20],
];

function groupById($list)
{
    return groupBy('id')($list);
}

$grouped = groupById($records);

/*
 * resultado :    [
 * 1 => [ [ "id" => 1, "value1" => 5, "value2" => 10 ], [ "id" => 1, "value1" => 1, "value2" => 2 ] ], 
 * 2 => [ [ "id" => 2, "value1" => 50, "value2" => 100 ], [ "id" => 2, "value1" => 15, "value2" => 20 ] ], 
 * 3 => [ [ "id" => 3, "value1" => 15, "value2" => 20 ] ]   
 *   ];
*/

```

Map usage :
```php 
Slash\map([1, 2, 3], function ($n) { return $n * 2; });  // === [2, 4, 6]
```

## Docs
[docs](https://github.com/masterfermin02/slash/blob/master/docs/Operations.md)

## Feedback
Found a bug or have a suggestion? Please [create a new GitHub issue](https://github.com/masterfermin02/slash/issues/new). We want your feedback!
