# Slash
This library is full functional PHP utility, similar to Underscore/Lodash.

## Install
```bash
composer require masterfermin02/slash
```

## Functionality

```php
<?php

use function Slash\getWith;
use function Slash\useWith;
use function Slash\equalTo;
use function Slash\filterWith;
use function Slash\pluckWith;
use function Slash\averageWith;

$withinMale             = useWith(equalTo('male'), getWith('gender'));
$filterByMale           = filterWith($withinMale);
$caculateAverageMaleAge = Slash\pipeLine(
 $filterByMale,
 pluckWith('age'),
 'Slash\average'
);
$data = [
 ['name' => 'John', 'age' => 12, 'gender' => 'male'],
 ['name' => 'Jane', 'age' => 34, 'gender' => 'female'],
 ['name' => 'Pete', 'age' => 23, 'gender' => 'male'],
 ['name' => 'Mark', 'age' => 11, 'gender' => 'male'],
 ['name' => 'Mary', 'age' => 42, 'gender' => 'female'],
];
$avgMaleAge = $caculateAverageMaleAge($data);

echo "Average male age is $avgMaleAge.";
```
