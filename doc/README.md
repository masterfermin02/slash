# Slash Documentation

Slash is a functional programming library for PHP, inspired by Ramda.js. It provides a set of utilities to help you write cleaner, more maintainable code using functional programming principles.

## Table of Contents

- [Introduction](#introduction)
- [Installation](#installation)
- [Core Concepts](#core-concepts)
  - [Pure Functions](#pure-functions)
  - [Immutability](#immutability)
  - [Currying](#currying)
  - [Function Composition](#function-composition)
- [Getting Started](#getting-started)
- [API Reference](#api-reference)
- [Examples](#examples)
- [Contributing](#contributing)

## Introduction

Slash is designed to make functional programming in PHP more accessible and practical. It provides a comprehensive set of utility functions that follow functional programming principles:

- **Pure functions**: Functions that always return the same output for the same input and have no side effects
- **Immutability**: Data is never modified; instead, new copies with changes are created
- **Currying**: Functions that can be partially applied, creating new functions with some arguments pre-filled
- **Function composition**: Building complex functions by combining simpler ones

## Installation

Slash requires PHP 8.0 or higher. You can install it via Composer:

```bash
composer require masterfermin02/slash
```

## Core Concepts

### Pure Functions

Pure functions are functions that:
- Always return the same output for the same input
- Have no side effects (don't modify external state)

Example:
```php
// Pure function
function add($a, $b) {
    return $a + $b;
}

// Using Slash
slash()->map([1, 2, 3], fn($n) => $n * 2); // Returns [2, 4, 6] without modifying original array
```

### Immutability

Slash never modifies your data. Instead, it returns new copies with the changes applied:

```php
$original = [1, 2, 3];
$doubled = slash()->map($original, fn($n) => $n * 2); // [2, 4, 6]

// $original is still [1, 2, 3]
```

### Currying

Currying is the technique of converting a function that takes multiple arguments into a sequence of functions that each take a single argument:

```php
$add = function($a, $b) { return $a + $b; };
$add5 = slash()->curryLeft($add, 5);
$add5(10); // 15
```

### Function Composition

Function composition allows you to build complex functions by combining simpler ones:

```php
$double = fn($x) => $x * 2;
$addOne = fn($x) => $x + 1;

$doubleThenAddOne = slash()->compose($addOne, $double);
$doubleThenAddOne(5); // 11 (5 * 2 = 10, 10 + 1 = 11)
```

## Getting Started

To start using Slash, you can either use the global `slash()` function or create a new instance:

```php
// Using the global function
$result = slash()->map([1, 2, 3], fn($n) => $n * 2);

// Or create a new instance
$slash = new \Slash\Slash();
$result = $slash->map([1, 2, 3], fn($n) => $n * 2);
```

## API Reference

Slash is organized into several modules:

- **Arrays**: Functions for working with arrays
- **Collections**: Functions for working with collections
- **Functions**: Utilities for working with functions
- **Objects**: Functions for working with objects
- **Utilities**: General utility functions

For a complete list of available functions, see the [Operations documentation](https://github.com/masterfermin02/slash/blob/master/docs/Operations.md).

## Examples

### Data Transformation

```php
// Transform an array of user data
$users = [
    ['id' => 1, 'name' => 'John', 'age' => 25],
    ['id' => 2, 'name' => 'Jane', 'age' => 30],
    ['id' => 3, 'name' => 'Bob', 'age' => 20],
];

// Get names of users over 21
$adultNames = slash()->map(
    slash()->filter($users, fn($user) => $user['age'] >= 21),
    fn($user) => $user['name']
);
// Result: ['John', 'Jane']
```

### Data Grouping

```php
// Group users by age category
$users = [
    ['id' => 1, 'name' => 'John', 'age' => 25],
    ['id' => 2, 'name' => 'Jane', 'age' => 30],
    ['id' => 3, 'name' => 'Bob', 'age' => 20],
    ['id' => 4, 'name' => 'Alice', 'age' => 25],
];

$getAgeCategory = function($user) {
    if ($user['age'] < 25) return 'young';
    if ($user['age'] < 30) return 'adult';
    return 'senior';
};

$groupedUsers = slash()->groupBy($users, $getAgeCategory);
/* Result:
[
    'young' => [['id' => 3, 'name' => 'Bob', 'age' => 20]],
    'adult' => [
        ['id' => 1, 'name' => 'John', 'age' => 25],
        ['id' => 4, 'name' => 'Alice', 'age' => 25]
    ],
    'senior' => [['id' => 2, 'name' => 'Jane', 'age' => 30]]
]
*/
```

### Function Composition

```php
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

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request or open an issue on the [GitHub repository](https://github.com/masterfermin02/slash).

For more information, see the [main README](https://github.com/masterfermin02/slash/blob/master/README.md).
