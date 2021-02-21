Operations
===
Is there an operation you'd like to see? [Open an issue](https://github.com/mpetrovich/dash/issues/new?labels=enhancement) or vote on an existing one.
Operation | Signature | Curried
:--- | :--- | :---
[Arrays](#arrays) | `: mixed\|array` | 
[Collections](#collections) | `: void` | 
[Functions](#functions) | `` | 
[Objects](#objects) | `: mixed` | 
[Slash](#slash) | `` | 
[Utilities](#utilities) | `: string` | 
[all](#all) | `: bool` | 
[any](#any) | `: bool` | 
[average](#average) | `: float\|int\|null` | 
[comparator](#comparator) | `: \Closure` | 
[compose](#compose) | `: \Closure\|mixed` | 
[curryLeft](#curryleft) | `curryLeft($callable, ...$outerArguments): \Closure` | 
[curryRight](#curryright) | `curryRight($callable, ...$outerArguments): \Closure` | 
[equal](#equal) | `: bool` | 
[equalTo](#equalto) | `: \Closure` | 
[filter](#filter) | `: array` | 
[filterWith](#filterwith) | `filterWith($fn): \Closure` | 
[first](#first) | `: mixed\|null` | 
[flatMap](#flatmap) | `: mixed` | 
[flatten](#flatten) | `: mixed` | 
[flip](#flip) | `: \Closure` | 
[get](#get) | `get($input, $prop): mixed` | 
[group](#group) | `: mixed` | 
[groupBy](#groupby) | `groupById($list): mixed` | 
[last](#last) | `: mixed\|null` | 
[lessThan](#lessthan) | `: bool` | 
[map](#map) | `: array` | 
[mapWith](#mapwith) | `mapWith($fn): \Closure` | 
[pair](#pair) | `: mixed` | 
[pipeLine](#pipeline) | `: \Closure` | 
[pluck](#pluck) | `: mixed` | 
[reject](#reject) | `: mixed` | 
[rejectWith](#rejectwith) | `rejectWith($fn): \Closure` | 
[sort](#sort) | `: mixed` | 
[sortBy](#sortby) | `sortBy($fn): \Closure` | 
[sum](#sum) | `: float\|int` | 
[unique](#unique) | `unique($collection, callable $callback = null, $strict = true): array` | 
[useWith](#usewith) | `: \Closure` | 
[walk](#walk) | `` | 

Arrays
---

```php
: mixed|array
```
Get the first n elements.

**Returns** | `mixed\|array` |
**Example:** Get the first n elements.
```php

@param array $elements
@param integer $amount
@return mixed|array
```
[↑ Top](#operations)
Collections
---

```php
: void
```
Iterate through $collection using $iterator.

**Returns** | `void` |
**Example:** Iterate through $collection using $iterator.
```php

@param array $collection
@param Closure $iterator
@return void
```
[↑ Top](#operations)
Functions
---

```php

```
The cached closures.


**Example:** The cached closures.
```php

@var array
```
[↑ Top](#operations)
Objects
---

```php
: mixed
```
Invoke $closure on $object, then return $object.

**Returns** | `mixed` |
**Example:** Invoke $closure on $object, then return $object.
```php

@param mixed $object
@param Closure $closure
@return mixed
```
[↑ Top](#operations)
Slash
---

```php

```
The instance of Slash.


**Example:** The instance of Slash.
```php

@var Slash
```
[↑ Top](#operations)
Utilities
---

```php
: string
```
Generate a unique identifier.

**Returns** | `string` |
**Example:** Generate a unique identifier.
```php

@param string $prefix
@return string
```
[↑ Top](#operations)
all
---

```php
: bool
```
Return true only If all the element of the list pass the predicate


    Slash\all([1, 3, 5], 'Slash\isOdd'); // === true

    Slash\all([1, 3, 5], function ($n) { return $n != 3; }); // === false

    Slash\all([], 'Slash\isOdd'); // === true

    Slash\all((object) ['a' => 1, 'b' => 3, 'c' => 5], 'Slash\isOdd'); // === true
**Returns** | `bool` |
**Example:** Return true only If all the element of the list pass the predicate
```php

@param $array
@param $predicate
@return bool

    Slash\all([1, 3, 5], 'Slash\isOdd'); // === true

    Slash\all([1, 3, 5], function ($n) { return $n != 3; }); // === false

    Slash\all([], 'Slash\isOdd'); // === true

    Slash\all((object) ['a' => 1, 'b' => 3, 'c' => 5], 'Slash\isOdd'); // === true
```
[↑ Top](#operations)
any
---

```php
: bool
```
Return true if at least one element matches the predicate


    Slash\any([1, 3, 5], 'Slash\isOdd'); // === true

    Slash\any([1, 3, 5], function ($n) { return $n != 3; }); // === true

    Slash\any([], 'Slash\isOdd'); // === false

    Slash\any([2, 4, 8], 'Slash\isOdd'); // === false

    Slash\any((object) ['a' => 1, 'b' => 3, 'c' => 5], 'Slash\isOdd'); // === true
**Returns** | `bool` |
**Example:** Return true if at least one element matches the predicate
```php

@param $array
@param $predicate
@return bool

    Slash\any([1, 3, 5], 'Slash\isOdd'); // === true

    Slash\any([1, 3, 5], function ($n) { return $n != 3; }); // === true

    Slash\any([], 'Slash\isOdd'); // === false

    Slash\any([2, 4, 8], 'Slash\isOdd'); // === false

    Slash\any((object) ['a' => 1, 'b' => 3, 'c' => 5], 'Slash\isOdd'); // === true
```
[↑ Top](#operations)
average
---

```php
: float|int|null
```
Return the average of an array


    Slash\average([1, 3, 5]); // === 3
**Returns** | `float\|int\|null` |
**Example:** Return the average of an array
```php

@param $list
@return float|int|null

    Slash\average([1, 3, 5]); // === 3
```
[↑ Top](#operations)
comparator
---

```php
: \Closure
```
Takes a binary comparison function
and returns a version that adhere's to the Array#sort
API of return -1, 0 or 1 for sorting.



Slash\comparator(Slash\greaterThan([1, 0])) // === -1
**Returns** | `\Closure` |
**Example:** Takes a binary comparison function
```php
and returns a version that adhere's to the Array#sort
API of return -1, 0 or 1 for sorting.

@param $fn
@return \Closure


Slash\comparator(Slash\greaterThan([1, 0])) // === -1
```
[↑ Top](#operations)
compose
---

```php
: \Closure|mixed
```
This function allows creating a new function from two functions passed into it
Compose: f(g(x)) for variable number of arguments (recursive)
Takes two or more functions as arguments and returns a function
that will compose those functions passing its input to the
right-most, inner function.
ie., compose(f,g,h) == f(g(h()))


$pipelines = compose(
cleanString,
turnFirstLetterUp,
addPoint
);

echo $pipelines("hello world----"); // === "Hello world."
**Returns** | `\Closure\|mixed` |
**Example:** This function allows creating a new function from two functions passed into it
```php
Compose: f(g(x)) for variable number of arguments (recursive)
Takes two or more functions as arguments and returns a function
that will compose those functions passing its input to the
right-most, inner function.
ie., compose(f,g,h) == f(g(h()))
@param $args
@return \Closure|mixed


$pipelines = compose(
cleanString,
turnFirstLetterUp,
addPoint
);

echo $pipelines("hello world----"); // === "Hello world."
```
[↑ Top](#operations)
curryLeft
---

```php
curryLeft($callable, ...$outerArguments): \Closure
```
Returns a curried version of the function `fn`, with arguments
curried from left -> right.  Uses the natural arity of `fn` to
determine how many arguments to curry, or `n` if passed.



$greaterThan3 = function ($number) {
        return $number > 3;
};

$filterGreaterThan3 = Slash\curryLeft('Slash\filter', $greaterThan3);

$filteredNumber = $filterGreaterThan3([1, 2, 3, 4, ,5]) ; // === [4, 5]
**Returns** | `\Closure` |
**Example:** Returns a curried version of the function `fn`, with arguments
```php
curried from left -> right.  Uses the natural arity of `fn` to
determine how many arguments to curry, or `n` if passed.

@param $callable
@param $outerArguments
@return \Closure


$greaterThan3 = function ($number) {
        return $number > 3;
};

$filterGreaterThan3 = Slash\curryLeft('Slash\filter', $greaterThan3);

$filteredNumber = $filterGreaterThan3([1, 2, 3, 4, ,5]) ; // === [4, 5]
```
[↑ Top](#operations)
curryRight
---

```php
curryRight($callable, ...$outerArguments): \Closure
```
Returns a curried version of the function `fn`, with arguments
curried from right -> left.  Uses the natural arity of `fn` to
determine how many arguments to curry, or `n` if passed.



$greaterThan3 = function ($number) {
return $number > 3;
};

$filterGreaterThan3 = Slash\curryRight('Slash\filter', $greaterThan3);

$filteredNumber = $filterGreaterThan3([1, 2, 3, 4, ,5]) ; // === [4, 5]
**Returns** | `\Closure` |
**Example:** Returns a curried version of the function `fn`, with arguments
```php
curried from right -> left.  Uses the natural arity of `fn` to
determine how many arguments to curry, or `n` if passed.

@param $callable
@param $outerArguments
@return \Closure


$greaterThan3 = function ($number) {
return $number > 3;
};

$filterGreaterThan3 = Slash\curryRight('Slash\filter', $greaterThan3);

$filteredNumber = $filterGreaterThan3([1, 2, 3, 4, ,5]) ; // === [4, 5]
```
[↑ Top](#operations)
equal
---

```php
: bool
```
Compare if value $a is equal to $b


equal(1, 2); // false
equal(1,1); // true
**Returns** | `bool` |
**Example:** Compare if value $a is equal to $b
```php
@param $a
@param $b
@return bool


equal(1, 2); // false
equal(1,1); // true
```
[↑ Top](#operations)
equalTo
---

```php
: \Closure
```
Returns a curried version of the function of equal function



$equalToFive = equalTo(5);
$isEqualTo5 = $equalToFive(5); // true
$isEqualTo5 = $equalToFive(4); // false
**Returns** | `\Closure` |
**Example:** Returns a curried version of the function of equal function
```php

@param $to
@return \Closure


$equalToFive = equalTo(5);
$isEqualTo5 = $equalToFive(5); // true
$isEqualTo5 = $equalToFive(4); // false
```
[↑ Top](#operations)
filter
---

```php
: array
```
Filter `list` using the predicate function `fn`



Slash\filter([1,2,3],function($number) { return $number === 2; }); // === [2]
**Returns** | `array` |
**Example:** Filter `list` using the predicate function `fn`
```php

@param $list
@param $fn
@return array


Slash\filter([1,2,3],function($number) { return $number === 2; }); // === [2]
```
[↑ Top](#operations)
filterWith
---

```php
filterWith($fn): \Closure
```

**Returns** | `\Closure` |
**Example:** @param $fn
```php
@return \Closure
```
[↑ Top](#operations)
first
---

```php
: mixed|null
```
Return the first / last element matching a predicate



Slash\first([1,2,3],function($number) { return $number === 2; }); // === 2
**Returns** | `mixed\|null` |
**Example:** Return the first / last element matching a predicate
```php

@param $array
@param $predicate
@return mixed|null


Slash\first([1,2,3],function($number) { return $number === 2; }); // === 2
```
[↑ Top](#operations)
flatMap
---

```php
: mixed
```
Return a flattened list which is the result of passing each
item in `list` thorugh the function `fn`



Slash\flatMap([[1,2],[3,4]], function($x) { return $x + 1; }) // === [2,3,4,5]
**Returns** | `mixed` |
**Example:** Return a flattened list which is the result of passing each
```php
item in `list` thorugh the function `fn`

@param $list
@param $fn
@return mixed


Slash\flatMap([[1,2],[3,4]], function($x) { return $x + 1; }) // === [2,3,4,5]
```
[↑ Top](#operations)
flatten
---

```php
: mixed
```
Return a copy of the array 'list' flattened by one level, ie [[1,2],[3,4]] = [1,2,3,4]



Slash\flatten([[1,2],[3,4]]) // === [1,2,3,4]
**Returns** | `mixed` |
**Example:** Return a copy of the array 'list' flattened by one level, ie [[1,2],[3,4]] = [1,2,3,4]
```php

@param $list
@return mixed


Slash\flatten([[1,2],[3,4]]) // === [1,2,3,4]
```
[↑ Top](#operations)
flip
---

```php
: \Closure
```
Returns a new function
that calls the original function with arguments reversed.


$add = function($number1, $number2, $number3) {
return $number + $number2 + $number3;
};

Slash\flip($add)(1,2,3); // === 6
**Returns** | `\Closure` |
**Example:** Returns a new function
```php
that calls the original function with arguments reversed.

@param $fn
@return \Closure

$add = function($number1, $number2, $number3) {
return $number + $number2 + $number3;
};

Slash\flip($add)(1,2,3); // === 6
```
[↑ Top](#operations)
get
---

```php
get($input, $prop): mixed
```

**Returns** | `mixed` |
**Example:** @param $input
```php
@param $prop
@return mixed
```
[↑ Top](#operations)
group
---

```php
: mixed
```
Returns an object which groups objects in `list` by property `prop`. If
`prop` is a function, will group the objects in list using the string returned
by passing each obj through `prop` function.



Slash\group([1,2,3], function($number) {
        return Slash\even($number) ? 'Even' : 'Odd';
});
    // === [
'Even' => [2]
'Odd' => [1,3]
]


=====================================================
use function Slash\group;

$records = [
['id' => 1, 'value1' => 5, 'value2' => 10],
['id' => 2, 'value1' => 50, 'value2' => 100],
['id' => 1, 'value1' => 2, 'value2' => 2],
['id' => 2, 'value1' => 15, 'value2' => 20],
['id' => 3, 'value1' => 15, 'value2' => 20],
];

$grouped = group($records, 'id');

resultado :    [
1 => [ [ "id" => 1, "value1" => 5, "value2" => 10 ], [ "id" => 1, "value1" => 1, "value2" => 2 ] ],
2 => [ [ "id" => 2, "value1" => 50, "value2" => 100 ], [ "id" => 2, "value1" => 15, "value2" => 20 ] ],
3 => [ [ "id" => 3, "value1" => 15, "value2" => 20 ] ]
];
**Returns** | `mixed` |
**Example:** Returns an object which groups objects in `list` by property `prop`. If
```php
`prop` is a function, will group the objects in list using the string returned
by passing each obj through `prop` function.

@param $list
@param $prop
@return mixed


Slash\group([1,2,3], function($number) {
        return Slash\even($number) ? 'Even' : 'Odd';
});
    // === [
'Even' => [2]
'Odd' => [1,3]
]


=====================================================
use function Slash\group;

$records = [
['id' => 1, 'value1' => 5, 'value2' => 10],
['id' => 2, 'value1' => 50, 'value2' => 100],
['id' => 1, 'value1' => 2, 'value2' => 2],
['id' => 2, 'value1' => 15, 'value2' => 20],
['id' => 3, 'value1' => 15, 'value2' => 20],
];

$grouped = group($records, 'id');

resultado :    [
1 => [ [ "id" => 1, "value1" => 5, "value2" => 10 ], [ "id" => 1, "value1" => 1, "value2" => 2 ] ],
2 => [ [ "id" => 2, "value1" => 50, "value2" => 100 ], [ "id" => 2, "value1" => 15, "value2" => 20 ] ],
3 => [ [ "id" => 3, "value1" => 15, "value2" => 20 ] ]
];
```
[↑ Top](#operations)
groupBy
---

```php
groupById($list): mixed
```
Returns an object which groups objects in `list` by property `prop`. If
`prop` is a function, will group the objects in list using the string returned
by passing each obj through `prop` function.



Slash\groupBy(function($number) {
return Slash\even($number) ? 'Even' : 'Odd';
})([1,2,3]);
// === [
'Even' => [2]
'Odd' => [1,3]
]


=====================================================
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

resultado :    [
1 => [ [ "id" => 1, "value1" => 5, "value2" => 10 ], [ "id" => 1, "value1" => 1, "value2" => 2 ] ],
2 => [ [ "id" => 2, "value1" => 50, "value2" => 100 ], [ "id" => 2, "value1" => 15, "value2" => 20 ] ],
3 => [ [ "id" => 3, "value1" => 15, "value2" => 20 ] ]
];
**Returns** | `mixed` |
**Example:** Returns an object which groups objects in `list` by property `prop`. If
```php
`prop` is a function, will group the objects in list using the string returned
by passing each obj through `prop` function.

@param $list
@param $prop
@return mixed


Slash\groupBy(function($number) {
return Slash\even($number) ? 'Even' : 'Odd';
})([1,2,3]);
// === [
'Even' => [2]
'Odd' => [1,3]
]


=====================================================
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

resultado :    [
1 => [ [ "id" => 1, "value1" => 5, "value2" => 10 ], [ "id" => 1, "value1" => 1, "value2" => 2 ] ],
2 => [ [ "id" => 2, "value1" => 50, "value2" => 100 ], [ "id" => 2, "value1" => 15, "value2" => 20 ] ],
3 => [ [ "id" => 3, "value1" => 15, "value2" => 20 ] ]
];
```
[↑ Top](#operations)
last
---

```php
: mixed|null
```
return the last element of the array that match the predicate



Slash\last([1,2,3],function($number) { return $number === 2; }); // === 2
**Returns** | `mixed\|null` |
**Example:** return the last element of the array that match the predicate
```php

@param $array
@param $test
@return mixed|null


Slash\last([1,2,3],function($number) { return $number === 2; }); // === 2
```
[↑ Top](#operations)
lessThan
---

```php
: bool
```

**Returns** | `bool` |
**Example:** @param $a
```php
@param $b
@return bool
```
[↑ Top](#operations)
map
---

```php
: array
```
Returns a new list by applying the function `fn` to each item
in `list`



Slash\map([1,2,3], function($x){ return $x+1; }); // [2,3,4]
**Returns** | `array` |
**Example:** Returns a new list by applying the function `fn` to each item
```php
in `list`

@param $list
@param $fn
@return array


Slash\map([1,2,3], function($x){ return $x+1; }); // [2,3,4]
```
[↑ Top](#operations)
mapWith
---

```php
mapWith($fn): \Closure
```
Return \Closure that Returns a new list by applying the function `fn` to each item


Slash\mapWith(function($x){ return $x+1; })([1,2,3]); // [2,3,4]
**Returns** | `\Closure` |
**Example:** Return \Closure that Returns a new list by applying the function `fn` to each item
```php
@param $fn
@return \Closure


Slash\mapWith(function($x){ return $x+1; })([1,2,3]); // [2,3,4]
```
[↑ Top](#operations)
pair
---

```php
: mixed
```
Return new list as combination of the two lists passed
The second list can be a function which will be passed each item
from the first list and should return an array to combine against for that
item. If either argument is not a list, it will be treated as a list.


Ex.,   pair([a,b], [c,d]) => [[a,c],[a,d],[b,c],[b,d]]
**Returns** | `mixed` |
**Example:** Return new list as combination of the two lists passed
```php
The second list can be a function which will be passed each item
from the first list and should return an array to combine against for that
item. If either argument is not a list, it will be treated as a list.

@param $list
@param $listFn
@return mixed

Ex.,   pair([a,b], [c,d]) => [[a,c],[a,d],[b,c],[b,d]]
```
[↑ Top](#operations)
pipeLine
---

```php
: \Closure
```
Reverse of compose, taking it's arguments and chaining
them from left -> right



ie., pipeline(f,g,h) = h(g(f()))
**Returns** | `\Closure` |
**Example:** Reverse of compose, taking it's arguments and chaining
```php
them from left -> right

@return \Closure


ie., pipeline(f,g,h) = h(g(f()))
```
[↑ Top](#operations)
pluck
---

```php
: mixed
```
Given a list of objects, return a list of the values
for property 'prop' in each object
**Returns** | `mixed` |
**Example:** Given a list of objects, return a list of the values
```php
for property 'prop' in each object
@param $list
@param $prop
@return mixed
```
[↑ Top](#operations)
reject
---

```php
: mixed
```

**Returns** | `mixed` |
**Example:** @param $list
```php
@param $func
@return mixed
```
[↑ Top](#operations)
rejectWith
---

```php
rejectWith($fn): \Closure
```

**Returns** | `\Closure` |
**Example:** @param $fn
```php
@return \Closure
```
[↑ Top](#operations)
sort
---

```php
: mixed
```
Sort a list using comparator function `fn`,
returns new array (shallow copy) in sorted order.



$descending = comparator(greaterThan);

Slash\sort([1,2,3,4,5], $descending); // === [5,4,3,2,1]
**Returns** | `mixed` |
**Example:** Sort a list using comparator function `fn`,
```php
returns new array (shallow copy) in sorted order.

@param $list
@param $fn
@return mixed


$descending = comparator(greaterThan);

Slash\sort([1,2,3,4,5], $descending); // === [5,4,3,2,1]
```
[↑ Top](#operations)
sortBy
---

```php
sortBy($fn): \Closure
```
Sort a list using comparator function `fn`,
returns \Closure that returns new array (shallow copy) in sorted order.



$descending = comparator(greaterThan);

Slash\sortBy($descending)([1,2,3,4,5]); // === [5,4,3,2,1]
**Returns** | `\Closure` |
**Example:** Sort a list using comparator function `fn`,
```php
returns \Closure that returns new array (shallow copy) in sorted order.

@param $fn
@return \Closure


$descending = comparator(greaterThan);

Slash\sortBy($descending)([1,2,3,4,5]); // === [5,4,3,2,1]
```
[↑ Top](#operations)
sum
---

```php
: float|int
```

**Returns** | `float\|int` |
**Example:** @param $list
```php
@return float|int
```
[↑ Top](#operations)
unique
---

```php
unique($collection, callable $callback = null, $strict = true): array
```
Returns an array of unique elements


Slash\unique([1, 3, 5,1,4,6,2,7]); // === [1,2,3,4,5,6,7]
**Returns** | `array` |
**Example:** Returns an array of unique elements
```php

@param Traversable|array $collection
@param callable $callback
@param bool $strict
@return array

Slash\unique([1, 3, 5,1,4,6,2,7]); // === [1,2,3,4,5,6,7]
```
[↑ Top](#operations)
useWith
---

```php
: \Closure
```
Similar to Ramda's useWith(fn,...) which allows you to supply
a function `fn`, along with one or more transform functions. When
the returned function is called, it will each argument passed to `fn`
using the correlating transform function - if there are more arguments
than transform functions, those arguments will be passed as is.



$sum = function($a, $b) { return $a + $b;  };

Slash\useWith($sum, Slash\getWith('a'), Slash\getWith('b'))(['a' => 1, 'b' => 1]); // === 2
**Returns** | `\Closure` |
**Example:** Similar to Ramda's useWith(fn,...) which allows you to supply
```php
a function `fn`, along with one or more transform functions. When
the returned function is called, it will each argument passed to `fn`
using the correlating transform function - if there are more arguments
than transform functions, those arguments will be passed as is.

@param $fn
@return \Closure


$sum = function($a, $b) { return $a + $b;  };

Slash\useWith($sum, Slash\getWith('a'), Slash\getWith('b'))(['a' => 1, 'b' => 1]); // === 2
```
[↑ Top](#operations)
walk
---

```php

```


**Example:** @param $list
```php
@param $fn
```
[↑ Top](#operations)