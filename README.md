# Slash
This library is full functional PHP utility, similar to Underscore/Lodash.

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

## Feedback
Found a bug or have a suggestion? Please [create a new GitHub issue](https://github.com/masterfermin02/slash/issues/new). We want your feedback!
