Operations
===
Is there an operation you'd like to see? [Open an issue](https://github.com/masterfermin02/slash/issues/new?labels=enhancement) or vote on an existing one.
Operation | Signature | Curried
:--- | :--- | :---
[Arrays](#arrays) | `Arrays::first(), Arrays::initial(), Arrays::rest(), Arrays::last(), Arrays::pack(), Arrays::flatten(), Arrays::range(), Arrays::difference(), Arrays::unique(), Arrays::without(), Arrays::zip(), Arrays::indexOf(), Arrays::intersection(), Arrays::union()` | 
[Collections](#collections) | `Collections::each(), Collections::map(), Collections::toArray(), Collections::size(), Collections::shuffle(), Collections::any(), Collections::all(), Collections::reject(), Collections::pluck(), Collections::contains(), Collections::invoke(), Collections::reduce(), Collections::sortBy(), Collections::groupBy(), Collections::max(), Collections::min()` | 
[Functions](#functions) | `Functions::cache(), Functions::wrap(), Functions::compose(), Functions::once(), Functions::after()` | 
[Objects](#objects) | `Objects::apply(), Objects::has(), Objects::keys(), Objects::values(), Objects::extend(), Objects::defaults(), Objects::copy(), Objects::methods(), Objects::isNull(), Objects::isTraversable(), Objects::isArray(), Objects::isDate(), Objects::isNumber(), Objects::isBoolean(), Objects::isString(), Objects::isFunction(), Objects::isObject(), Objects::isEqual(), Objects::isEmpty()` | 
[Slash](#slash) | `Slash::make(), Slash::load(), Slash::hasModule(), Slash::addModule(), Slash::getModules(), Slash::isLoaded(), Slash::getInstance(), Slash::hasMethod(), Slash::run()` | 
[Utilities](#utilities) | `Utilities::id(), Utilities::escape(), Utilities::with(), Utilities::times()` | 
[all](#all) | `all($array, $predicate): bool` | 
[any](#any) | `any($array, $predicate): bool` | 
[average](#average) | `average($list): float\|int\|null` | 
[comparator](#comparator) | `comparator($fn): \Closure` | 
[compose](#compose) | `compose(...$args): \Closure\|mixed` | 
[curryLeft](#curryleft) | `curryLeft($callable, ...$outerArguments): \Closure` | 
[curryRight](#curryright) | `curryRight($callable, ...$outerArguments): \Closure` | 
[equal](#equal) | `equal($a, $b): bool` | 
[equalTo](#equalto) | `equalTo($to): \Closure` | 
[filter](#filter) | `filter($list, $fn): array` | 
[filterWith](#filterwith) | `filterWith($fn): \Closure` | 
[first](#first) | `first($array, $predicate = null): mixed\|null` | 
[flatMap](#flatmap) | `flatMap($list, $fn): mixed` | 
[flatten](#flatten) | `flatten($list): mixed` | 
[flip](#flip) | `flip($fn): \Closure` | 
[get](#get) | `get($input, $prop): mixed` | 
[greaterThanOrEqual](#greaterthanorequal) | `greaterThanOrEqual($a, $b): bool` | 
[group](#group) | `group($list, $prop): mixed` | 
[groupBy](#groupby) | `groupBy($fn): \Closure` | 
[last](#last) | `last($array, $test = null): mixed\|null` | 
[lessThan](#lessthan) | `lessThan($a, $b): bool` | 
[map](#map) | `map($list, $fn): array` | 
[mapWith](#mapwith) | `mapWith($fn): \Closure` | 
[pair](#pair) | `pair($list, $listFn): mixed` | 
[pipeLine](#pipeline) | `pipeLine(): \Closure` | 
[pluck](#pluck) | `pluck($list, $prop): mixed` | 
[reject](#reject) | `reject($list, $func): mixed` | 
[rejectWith](#rejectwith) | `rejectWith($fn): \Closure` | 
[sort](#sort) | `sort($list, $fn): mixed` | 
[sortBy](#sortby) | `sortBy($fn): \Closure` | 
[sum](#sum) | `sum($list): float\|int` | 
[unique](#unique) | `unique($collection, callable $callback = null, $strict = true): array` | 
[useWith](#usewith) | `useWith($fn /*, txfn, ... */): \Closure` | 
[walk](#walk) | `walk(&$list, $fn): void` | 

Arrays
---

```php
Arrays::first(), Arrays::initial(), Arrays::rest(), Arrays::last(), Arrays::pack(), Arrays::flatten(), Arrays::range(), Arrays::difference(), Arrays::unique(), Arrays::without(), Arrays::zip(), Arrays::indexOf(), Arrays::intersection(), Arrays::union()
```
* Get the first n elements.
* Exclude the last n elements.
* Get the rest of the elements.
* Get the last n elements.
* Remove falsy values.
* "Flatten" an array.
* Create an array containing a range of elements.
* Compute the difference between the two.
* Remove duplicated values.
* Remove all instances of $ignore found in $elements (=== is used).
* Merge two arrays.
* Get the index of the first match.
* Return the intersection of two arrays.
* Returns an array containing the unique items in both arrays.

**Example:** Get the first n elements.
```php
@param array<TKey, TValue> $elements
@param integer $amount
@return array<TKey, TValue>
```
[↑ Top](#operations)
Collections
---

```php
Collections::each(), Collections::map(), Collections::toArray(), Collections::size(), Collections::shuffle(), Collections::any(), Collections::all(), Collections::reject(), Collections::pluck(), Collections::contains(), Collections::invoke(), Collections::reduce(), Collections::sortBy(), Collections::groupBy(), Collections::max(), Collections::min()
```
* Iterate through $collection using $iterator.
* "Map" through $collection using $iterator.
* Convert $value to an array.
* Calculate the size of $value.
* "Shuffle" the given $collection.
* Check whether any values in $collection pass $iterator.
* Check whether all values in $collection pass $iterator.
* Run $iterator and remove all failing items in $collection.
* Extract an array of values associated with $key from $collection.
* Determine if $collection contains $value (=== is used).
* Run $function across all elements in $collection.
* Reduce $collection into a single value using $iterator.
* Return $collection sorted in ascending order based on $iterator results.
* Group values in $collection by $iterator's return value.
* Return the maximum value from $collection.
* Return the minimum value from $collection.

**Example:** Iterate through $collection using $iterator.
```php
@param array<TKey, TValue> $collection
@param Closure $iterator
@return void
```
[↑ Top](#operations)
Functions
---

```php
Functions::cache(), Functions::wrap(), Functions::compose(), Functions::once(), Functions::after()
```
* Execute $closure and cache its output.
* Wrap $closure inside $wrapper.
* Compose $closures.
* Execute $closure only once and ignore future calls.
* Only execute $closure after the exact $number of failed tries.

**Example:** Execute $closure and cache its output.
```php
@param Closure $closure
@return string
```
[↑ Top](#operations)
Objects
---

```php
Objects::apply(), Objects::has(), Objects::keys(), Objects::values(), Objects::extend(), Objects::defaults(), Objects::copy(), Objects::methods(), Objects::isNull(), Objects::isTraversable(), Objects::isArray(), Objects::isDate(), Objects::isNumber(), Objects::isBoolean(), Objects::isString(), Objects::isFunction(), Objects::isObject(), Objects::isEqual(), Objects::isEmpty()
```
* Invoke $closure on $object, then return $object.
* Determine whether $object has $key.
* Get all keys from $object.
* Get all values from $object.
* Extend $source with $destination.
* Fill in undefined properties in $object with values from $defaults.
* Create a shallow copy of $value.
* Get all methods from $object.
* Determine whether $value is null.
* Determine whether $value is traversable.
* Determine whether $value is an array.
* Determine whether $value is a date.
* Determine whether $value is a number.
* Determine whether $value is a boolean.
* Determine whether $value is a string.
* Determine whether $value is a function.
* Determine whether $value is an object.
* Determine whether $left is equal to $right.
* Determine whether $value is empty.

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
Slash::make(), Slash::load(), Slash::hasModule(), Slash::addModule(), Slash::getModules(), Slash::isLoaded(), Slash::getInstance(), Slash::hasMethod(), Slash::run()
```
* Create a new instance of Slash.
* Load a module.
* Determine whether the module exists.
* Add a new module.
* Get all modules.
* Determine whether a module was loaded.
* Load a module (if not yet) and return its instance.
* Determine whether the given object has a method.
* Run a method and return its output.

**Example:** Create a new instance of Slash.
```php
@return static
```
[↑ Top](#operations)
Utilities
---

```php
Utilities::id(), Utilities::escape(), Utilities::with(), Utilities::times()
```
* Generate a unique identifier.
* Escape all HTML entities in a string.
* Return the value passed as the first argument.
* Invoke a $closure $number of times.

**Example:** Generate a unique identifier.
```php
@param string $prefix
@return string
```
[↑ Top](#operations)
all
---

```php
all($array, $predicate): bool
```
Returns true only if all the elements of the list pass the predicate function.

**Example:**
```php
use function Slash\all;
use function Slash\isOdd;

all([1, 3, 5], 'Slash\isOdd'); // === true
all([1, 3, 5], function ($n) { return $n != 3; }); // === false
all([], 'Slash\isOdd'); // === true
all((object) ['a' => 1, 'b' => 3, 'c' => 5], 'Slash\isOdd'); // === true
```
[↑ Top](#operations)
any
---

```php
any($array, $predicate): bool
```
Returns true if at least one element matches the predicate function.

**Example:**
```php
use function Slash\any;
use function Slash\isOdd;

any([1, 3, 5], 'Slash\isOdd'); // === true
any([1, 3, 5], function ($n) { return $n != 3; }); // === true
any([], 'Slash\isOdd'); // === false
any([2, 4, 8], 'Slash\isOdd'); // === false
any((object) ['a' => 1, 'b' => 3, 'c' => 5], 'Slash\isOdd'); // === true
```
[↑ Top](#operations)
average
---

```php
average($list): float|int|null
```
Returns the average of an array of numbers.

**Example:**
```php
use function Slash\average;

average([1, 3, 5]); // === 3
```
[↑ Top](#operations)
comparator
---

```php
comparator($fn): \Closure
```
Takes a binary comparison function and returns a version that adheres to the Array#sort API of returning -1, 0 or 1 for sorting.

**Example:**
```php
use function Slash\comparator;
use function Slash\greaterThan;

$compareFn = comparator('Slash\greaterThan');
$compareFn(1, 0); // === -1
```
[↑ Top](#operations)
compose
---

```php
compose(...$args): \Closure|mixed
```
This function allows creating a new function from two or more functions passed into it. Compose: f(g(x)) for variable number of arguments (recursive). Takes two or more functions as arguments and returns a function that will compose those functions passing its input to the right-most, inner function.

**Example:**
```php
use function Slash\compose;

function cleanString($str) {
    return preg_replace('/[-]+/', '', $str);
}

function turnFirstLetterUp($str) {
    return ucfirst($str);
}

function addPoint($str) {
    return $str . '.';
}

$pipelines = compose(
    'cleanString',
    'turnFirstLetterUp',
    'addPoint'
);

echo $pipelines("hello world----"); // === "Hello world."
```
[↑ Top](#operations)
curryLeft
---

```php
curryLeft($callable, ...$outerArguments): \Closure
```
Returns a curried version of the function `fn`, with arguments curried from left -> right. Uses the natural arity of `fn` to determine how many arguments to curry, or `n` if passed.

**Example:**
```php
use function Slash\curryLeft;
use function Slash\filter;

$greaterThan3 = function ($number) {
    return $number > 3;
};

$filterGreaterThan3 = curryLeft('Slash\filter', $greaterThan3);

$filteredNumbers = $filterGreaterThan3([1, 2, 3, 4, 5]); // === [4, 5]
```
[↑ Top](#operations)
curryRight
---

```php
curryRight($callable, ...$outerArguments): \Closure
```
Returns a curried version of the function `fn`, with arguments curried from right -> left. Uses the natural arity of `fn` to determine how many arguments to curry, or `n` if passed.

**Example:**
```php
use function Slash\curryRight;
use function Slash\filter;

$greaterThan3 = function ($number) {
    return $number > 3;
};

$filterGreaterThan3 = curryRight('Slash\filter', $greaterThan3);

$filteredNumbers = $filterGreaterThan3([1, 2, 3, 4, 5]); // === [4, 5]
```
[↑ Top](#operations)
equal
---

```php
equal($a, $b): bool
```
Compares if value $a is equal to $b.

**Example:**
```php
use function Slash\equal;

equal(1, 2); // false
equal(1, 1); // true
```
[↑ Top](#operations)
equalTo
---

```php
equalTo($to): \Closure
```
Returns a curried version of the equal function that checks if a value is equal to the provided value.

**Example:**
```php
use function Slash\equalTo;

$equalToFive = equalTo(5);
$isEqualTo5 = $equalToFive(5); // true
$isEqualTo5 = $equalToFive(4); // false
```
[↑ Top](#operations)
filter
---

```php
filter($list, $fn): array
```
Filters `list` using the predicate function `fn`.

**Example:**
```php
use function Slash\filter;

filter([1, 2, 3], function($number) { 
    return $number === 2; 
}); // === [2]
```
[↑ Top](#operations)
filterWith
---

```php
filterWith($fn): \Closure
```
Returns a curried version of the filter function that uses the provided predicate function.

**Example:**
```php
use function Slash\filterWith;

$isEven = function($n) { 
    return $n % 2 === 0; 
};
$filterEven = filterWith($isEven);
$filterEven([1, 2, 3, 4, 5]); // === [2, 4]
```
[↑ Top](#operations)
first
---

```php
first($array, $predicate = null): mixed|null
```
Returns the first element matching a predicate, or the first element if no predicate is provided.

**Example:**
```php
use function Slash\first;

first([1, 2, 3], function($number) { 
    return $number === 2; 
}); // === 2

first([1, 2, 3]); // === 1
```
[↑ Top](#operations)
flatMap
---

```php
flatMap($list, $fn): mixed
```
Returns a flattened list which is the result of passing each item in `list` through the function `fn`.

**Example:**
```php
use function Slash\flatMap;

flatMap([[1, 2], [3, 4]], function($x) { 
    return $x + 1; 
}); // === [2, 3, 4, 5]
```
[↑ Top](#operations)
flatten
---

```php
flatten($list): mixed
```
Returns a copy of the array 'list' flattened by one level, i.e., [[1,2],[3,4]] = [1,2,3,4].

**Example:**
```php
use function Slash\flatten;

flatten([[1, 2], [3, 4]]); // === [1, 2, 3, 4]
```
[↑ Top](#operations)
flip
---

```php
flip($fn): \Closure
```
Returns a new function that calls the original function with arguments reversed.

**Example:**
```php
use function Slash\flip;

$add = function($number1, $number2, $number3) {
    return $number1 + $number2 + $number3;
};

flip($add)(1, 2, 3); // === 6 (same as $add(3, 2, 1))
```
[↑ Top](#operations)
get
---

```php
get($input, $prop): mixed
```
Retrieves the value at the specified property from the input object or array.

**Example:**
```php
use function Slash\get;

$data = ['user' => ['name' => 'John', 'age' => 30]];
get($data, 'user.name'); // === 'John'

$obj = (object)['id' => 123, 'title' => 'Example'];
get($obj, 'title'); // === 'Example'
```
[↑ Top](#operations)
greaterThanOrEqual
---

```php
greaterThanOrEqual($a, $b): bool
```
Simple comparison for '>='.

**Example:**
```php
use function Slash\greaterThanOrEqual;

greaterThanOrEqual(5, 5); // === true
greaterThanOrEqual(6, 5); // === true
greaterThanOrEqual(4, 5); // === false
```
[↑ Top](#operations)
group
---

```php
group($list, $prop): mixed
```
Returns an object which groups objects in `list` by property `prop`. If `prop` is a function, will group the objects in list using the string returned by passing each obj through `prop` function.

**Example:**
```php
use function Slash\group;
use function Slash\even;

// Using a function to determine the group
group([1, 2, 3], function($number) {
    return even($number) ? 'Even' : 'Odd';
});
// === [
//   'Even' => [2],
//   'Odd' => [1, 3]
// ]

// Using a property name
$records = [
    ['id' => 1, 'value1' => 5, 'value2' => 10],
    ['id' => 2, 'value1' => 50, 'value2' => 100],
    ['id' => 1, 'value1' => 2, 'value2' => 2],
    ['id' => 2, 'value1' => 15, 'value2' => 20],
    ['id' => 3, 'value1' => 15, 'value2' => 20],
];

$grouped = group($records, 'id');
// === [
//   1 => [
//     ['id' => 1, 'value1' => 5, 'value2' => 10],
//     ['id' => 1, 'value1' => 2, 'value2' => 2]
//   ],
//   2 => [
//     ['id' => 2, 'value1' => 50, 'value2' => 100],
//     ['id' => 2, 'value1' => 15, 'value2' => 20]
//   ],
//   3 => [
//     ['id' => 3, 'value1' => 15, 'value2' => 20]
//   ]
// ]
```
[↑ Top](#operations)
groupBy
---

```php
groupBy($fn): \Closure
```
Returns a function that groups objects in a list by the property or function result specified.

**Example:**
```php
use function Slash\groupBy;
use function Slash\even;

// Using a function to determine the group
$groupByEvenOdd = groupBy(function($number) {
    return even($number) ? 'Even' : 'Odd';
});

$groupByEvenOdd([1, 2, 3]);
// === [
//   'Even' => [2],
//   'Odd' => [1, 3]
// ]

// Using a property name
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
// === [
//   1 => [
//     ['id' => 1, 'value1' => 5, 'value2' => 10],
//     ['id' => 1, 'value1' => 2, 'value2' => 2]
//   ],
//   2 => [
//     ['id' => 2, 'value1' => 50, 'value2' => 100],
//     ['id' => 2, 'value1' => 15, 'value2' => 20]
//   ],
//   3 => [
//     ['id' => 3, 'value1' => 15, 'value2' => 20]
//   ]
// ]
```
[↑ Top](#operations)
last
---

```php
last($array, $test = null): mixed|null
```
Returns the last element of the array that matches the predicate, or the last element if no predicate is provided.

**Example:**
```php
use function Slash\last;

last([1, 2, 3, 2, 1], function($number) { 
    return $number === 2; 
}); // === 2 (the second occurrence)

last([1, 2, 3]); // === 3
```
[↑ Top](#operations)
lessThan
---

```php
lessThan($a, $b): bool
```
Simple comparison for '<'.

**Example:**
```php
use function Slash\lessThan;

lessThan(3, 5); // === true
lessThan(5, 5); // === false
lessThan(7, 5); // === false
```
[↑ Top](#operations)
map
---

```php
map($list, $fn): array
```
Returns a new list by applying the function `fn` to each item in `list`.

**Example:**
```php
use function Slash\map;

map([1, 2, 3], function($x) { 
    return $x + 1; 
}); // === [2, 3, 4]
```
[↑ Top](#operations)
mapWith
---

```php
mapWith($fn): \Closure
```
Returns a closure that applies the function `fn` to each item in a list.

**Example:**
```php
use function Slash\mapWith;

$addOne = mapWith(function($x) { 
    return $x + 1; 
});

$addOne([1, 2, 3]); // === [2, 3, 4]
```
[↑ Top](#operations)
pair
---

```php
pair($list, $listFn): mixed
```
Returns a new list as a combination of the two lists passed. The second list can be a function which will be passed each item from the first list and should return an array to combine against for that item. If either argument is not a list, it will be treated as a list.

**Example:**
```php
use function Slash\pair;

pair(['a', 'b'], ['c', 'd']);
// === [['a', 'c'], ['a', 'd'], ['b', 'c'], ['b', 'd']]

pair([1, 2], function($n) { 
    return [$n * 10, $n * 100]; 
});
// === [[1, 10], [1, 100], [2, 20], [2, 200]]
```
[↑ Top](#operations)
pipeLine
---

```php
pipeLine(): \Closure
```
Reverse of compose, taking its arguments and chaining them from left -> right.

**Example:**
```php
use function Slash\pipeLine;

function addOne($x) { return $x + 1; }
function double($x) { return $x * 2; }
function square($x) { return $x * $x; }

$compute = pipeLine('addOne', 'double', 'square');
$compute(3); // === 64 (square(double(addOne(3)))) = square(double(4)) = square(8) = 64
```
[↑ Top](#operations)
pluck
---

```php
pluck($list, $prop): mixed
```
Given a list of objects, returns a list of the values for property 'prop' in each object.

**Example:**
```php
use function Slash\pluck;

$users = [
    ['id' => 1, 'name' => 'John', 'age' => 30],
    ['id' => 2, 'name' => 'Jane', 'age' => 25],
    ['id' => 3, 'name' => 'Bob', 'age' => 40]
];

pluck($users, 'name'); // === ['John', 'Jane', 'Bob']
```
[↑ Top](#operations)
reject
---

```php
reject($list, $func): mixed
```
Returns a new list containing elements from the original list that do not satisfy the predicate function.

**Example:**
```php
use function Slash\reject;

reject([1, 2, 3, 4, 5], function($n) { 
    return $n % 2 === 0; 
}); // === [1, 3, 5]
```
[↑ Top](#operations)
rejectWith
---

```php
rejectWith($fn): \Closure
```
Returns a function that filters out elements that satisfy the predicate function.

**Example:**
```php
use function Slash\rejectWith;

$rejectEven = rejectWith(function($n) { 
    return $n % 2 === 0; 
});

$rejectEven([1, 2, 3, 4, 5]); // === [1, 3, 5]
```
[↑ Top](#operations)
sort
---

```php
sort($list, $fn): mixed
```
Sorts a list using comparator function `fn`, returns new array (shallow copy) in sorted order.

**Example:**
```php
use function Slash\sort;
use function Slash\comparator;
use function Slash\greaterThan;

$descending = comparator('Slash\greaterThan');

sort([1, 2, 3, 4, 5], $descending); // === [5, 4, 3, 2, 1]
```
[↑ Top](#operations)
sortBy
---

```php
sortBy($fn): \Closure
```
Returns a function that sorts a list using the provided comparator function.

**Example:**
```php
use function Slash\sortBy;
use function Slash\comparator;
use function Slash\greaterThan;

$descending = comparator('Slash\greaterThan');
$sortDescending = sortBy($descending);

$sortDescending([1, 2, 3, 4, 5]); // === [5, 4, 3, 2, 1]
```
[↑ Top](#operations)
sum
---

```php
sum($list): float|int
```
Returns the sum of all elements in the list.

**Example:**
```php
use function Slash\sum;

sum([1, 2, 3, 4, 5]); // === 15
sum([1.5, 2.5]); // === 4.0
```
[↑ Top](#operations)
unique
---

```php
unique($collection, callable $callback = null, $strict = true): array
```
Returns an array of unique elements from the collection.

**Example:**
```php
use function Slash\unique;

unique([1, 3, 5, 1, 4, 6, 2, 7]); // === [1, 3, 5, 4, 6, 2, 7]

// With callback
unique([
    ['id' => 1, 'name' => 'John'],
    ['id' => 2, 'name' => 'Jane'],
    ['id' => 1, 'name' => 'John (duplicate)']
], function($item) {
    return $item['id'];
}); // === [['id' => 1, 'name' => 'John'], ['id' => 2, 'name' => 'Jane']]
```
[↑ Top](#operations)
useWith
---

```php
useWith($fn /*, txfn, ... */): \Closure
```
Similar to Ramda's useWith(fn,...) which allows you to supply a function `fn`, along with one or more transform functions. When the returned function is called, it will transform each argument passed to `fn` using the correlating transform function - if there are more arguments than transform functions, those arguments will be passed as is.

**Example:**
```php
use function Slash\useWith;
use function Slash\getWith;

$sum = function($a, $b) { 
    return $a + $b; 
};

useWith($sum, 'Slash\getWith', 'Slash\getWith')(['a' => 1, 'b' => 1]); // === 2

// More practical example
$getFullName = function($first, $last) {
    return $first . ' ' . $last;
};

$getNameFromObject = useWith($getFullName, 
    function($obj) { return $obj['firstName']; },
    function($obj) { return $obj['lastName']; }
);

$getNameFromObject(['firstName' => 'John', 'lastName' => 'Doe']); // === 'John Doe'
```
[↑ Top](#operations)
walk
---

```php
walk(&$list, $fn): void
```
Applies the function `fn` to each element in the list, modifying the list in place.

**Example:**
```php
use function Slash\walk;

$numbers = [1, 2, 3];
walk($numbers, function(&$value) {
    $value *= 2;
});
// $numbers is now [2, 4, 6]
```
[↑ Top](#operations)
