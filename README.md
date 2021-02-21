# Slash

[![Build Status](https://www.travis-ci.com/masterfermin02/slash.svg?branch=master)](https://travis-ci.org/masterfermin02/slash)
[![Latest Stable Version](http://img.shields.io/packagist/v/masterfermin02/slash.svg?style=flat)](https://packagist.org/packages/masterfermin02/slash)
[![Total Downloads](http://img.shields.io/packagist/dt/masterfermin02/slash.svg?style=flat)](https://packagist.org/packages/masterfermin02/slash)
[![codecov](https://codecov.io/gh/masterfermin02/slash/branch/master/graph/badge.svg)](https://codecov.io/gh/masterfermin02/slash)

A functional library for PHP programmers, similar to Ramdajs.

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

$groupById = groupBy('id');

$grouped = $groupById($records);

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
<?php 

use Slash\Slash;

Slash\map([1, 2, 3], fn ($n) => $n * 2);  // === [2, 4, 6]
```

Example with slash object:
```php
<?php
use Slash\Slash;

Slash::max([1, 2, 3]) // => 3

Slash::flatten([1, [2, [3]]]) // => [1, 2, 3]

Slash::last([1, 2, 3], 2) // => [2, 3]

```
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
Requires PHP 7.4+
```bash
composer require masterfermin02/slash
```

## Usage
Slash operations are pure functions that can be used alone.

# What It Offers
- 60+ useful functions that you can use in your projects.
- Slash is fully tested.
- The source code is clean and documented.

Here is what is available to you:

- boolean isDate(mixed $value)
- boolean isNumber(mixed $value)
- boolean isString(mixed $value)
- boolean isFunction(mixed $value)
- boolean isEmpty(mixed $value)
- boolean isEqual(mixed $left, mixed $right)
- boolean isBoolean(mixed $value)
- boolean isObject(mixed $value)
- boolean isArray(mixed $value)
- boolean isTraversable(mixed $value)
- boolean isNull(mixed $value)
- boolean has(mixed $object, string $key)
- array keys(mixed $object)
- array values(mixed $object)
- array methods(mixed $object)
- mixed copy(mixed $value)
- mixed extend(mixed $source, mixed $destination)
- mixed apply(mixed $object, Closure $closure)
- mixed defaults(mixed $object, array|mixed $defaults)
- string escape(string $string)
- string id(string $prefix = '')
- mixed with(mixed $value)
- void times(integer $number, Closure $closure)
- mixed cache(Closure $closure)
- mixed wrap(Closure $closure, Closure $wrapper)
- mixed compose(array $closures, array $arguments = array())
- void once(Closure $closure)
- mixed after(integer $number, Closure $closure)
- mixed|array first(array $elements, integer $amount = 1)
- array initial(array $elements, integer $amount = 1)
- array rest(array $elements, integer $index = 1)
- mixed|array last(array $elements, integer $amount = 1)
- array pack(array $elements)
- array flatten(array $elements)
- array range(integer $to, integer $from = 0, integer $step = 1)
- array difference(array $one, array $another)
- array unique(array $elements, Closure $iterator = null)
- array without(array $elements, array $ignore)
- array zip(array $one, array $another)
- integer indexOf(array $elements, mixed $element)
- array intersection(array $one, array $another)
- array union(array $one, array $another)
- void each(array $collection, Closure $iterator)
- array map(array $collection, Closure $iterator)
- array toArray(mixed $value)
- integer|null size(array|Countable $value)
- array shuffle(array $collection)
- boolean any(array $collection, Closure $iterator)
- boolean all(array $collection, Closure $iterator)
- array reject(array $collection, Closure $iterator)
- array pluck(array $collection, string $key)
- boolean contains(array $collection, mixed $value)
- array invoke(array $collection, string $function)
- mixed reduce(array $collection, Closure $iterator, mixed $initial = 0)
- array sortBy(array $collection, Closure $iterator)
- array groupBy(array $collection, Closure $iterator)
- mixed max(array $collection)
- mixed min(array $collection)

## Docs
[Read the docs](https://github.com/masterfermin02/slash/blob/master/docs/Operations.md)

## Feedback
Found a bug or have a suggestion? Please [create a new GitHub issue](https://github.com/masterfermin02/slash/issues/new). We want your feedback!
