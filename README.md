# Slash

[![Build Status](https://www.travis-ci.com/masterfermin02/slash.svg?branch=master)](https://travis-ci.org/masterfermin02/slash)
[![Latest Stable Version](http://img.shields.io/packagist/v/masterfermin02/slash.svg?style=flat)](https://packagist.org/packages/masterfermin02/slash)
[![Total Downloads](http://img.shields.io/packagist/dt/masterfermin02/slash.svg?style=flat)](https://packagist.org/packages/masterfermin02/slash)
[![codecov](https://codecov.io/gh/masterfermin02/slash/branch/master/graph/badge.svg)](https://codecov.io/gh/masterfermin02/slash)

A functional programming library for PHP, inspired by Ramda.js. Slash provides a set of utilities to help you write cleaner, more maintainable code using functional programming principles.

## Quick Examples

### Array Transformation
```php
<?php
// Map: Transform each element in an array
slash()->map([1, 2, 3], fn($n) => $n * 2);  // [2, 4, 6]

// Filter: Keep only elements that pass a test
slash()->filter([1, 2, 3, 4, 5], fn($n) => $n % 2 === 0);  // [2, 4]

// Reduce: Combine all elements into a single value
slash()->reduce([1, 2, 3, 4], fn($acc, $n) => $acc + $n, 0);  // 10
```

### Data Manipulation
```php
<?php
// Group data by a property
$records = [
    ["id" => 1, "value1" => 5, "value2" => 10],
    ["id" => 1, "value1" => 1, "value2" => 2],
    ["id" => 2, "value1" => 50, "value2" => 100],
    ["id" => 2, "value1" => 15, "value2" => 20],
    ["id" => 3, "value1" => 15, "value2" => 20]
];

$grouped = slash()->groupBy($records, 'id');
/*
Result:
[
    1 => [
        ["id" => 1, "value1" => 5, "value2" => 10],
        ["id" => 1, "value1" => 1, "value2" => 2]
    ],
    2 => [
        ["id" => 2, "value1" => 50, "value2" => 100],
        ["id" => 2, "value1" => 15, "value2" => 20]
    ],
    3 => [
        ["id" => 3, "value1" => 15, "value2" => 20]
    ]
]
*/
```

### Utility Functions
```php
<?php
// Find maximum value
slash()->max([1, 2, 3]);  // 3

// Flatten nested arrays
slash()->flatten([1, [2, [3]]]);  // [1, 2, 3]

// Get last elements
slash()->last([1, 2, 3, 4, 5], 2);  // [4, 5]

// Check if all elements satisfy a condition
slash()->all([1, 3, 5], fn($n) => $n % 2 === 1);  // true (all are odd)

// Check if any element satisfies a condition
slash()->any([1, 2, 3], fn($n) => $n > 2);  // true
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
Requires PHP 8+
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

## Documentation

Slash comes with comprehensive documentation to help you get started and make the most of the library:

- [**Getting Started Guide**](https://github.com/masterfermin02/slash/blob/master/doc/README.md): Learn the core concepts and see examples of how to use Slash effectively.
- [**API Reference**](https://github.com/masterfermin02/slash/blob/master/docs/Operations.md): Complete reference of all available functions and their usage.
- [**API Documentation**](https://github.com/masterfermin02/slash/blob/master/docs/api): Generated API documentation for the library.

## Functional Programming with Slash

Slash makes it easy to write functional code in PHP. Here are some more advanced examples:

### Function Composition

```php
<?php
// Create a pipeline of operations
$processData = slash()->pipeLine(
    slash()->mapWith(fn($x) => $x * 2),
    slash()->filterWith(fn($x) => $x > 5),
    slash()->sortBy(fn($a, $b) => $a - $b)
);

$result = $processData([1, 4, 2, 5]);
// Result: [6, 8, 10]
```

### Working with Objects

```php
<?php
// Extract and transform properties from objects
$products = [
    (object)['id' => 1, 'name' => 'Laptop', 'price' => 1000],
    (object)['id' => 2, 'name' => 'Phone', 'price' => 500],
    (object)['id' => 3, 'name' => 'Tablet', 'price' => 300],
];

$discountedPrices = slash()->map(
    $products,
    fn($product) => [
        'name' => $product->name,
        'price' => $product->price * 0.9 // 10% discount
    ]
);
```

## Feedback

Found a bug or have a suggestion? Please [create a new GitHub issue](https://github.com/masterfermin02/slash/issues/new). We want your feedback!

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.
