Operations
===
Is there an operation you'd like to see? [Open an issue](https://github.com/mpetrovich/dash/issues/new?labels=enhancement) or vote on an existing one.
Operation | Signature | Curried
:--- | :--- | :---
[all](#all) | `: bool` | 
[any](#any) | `: bool` | 
[average](#average) | `: float\|int\|null` | 
[comparator](#comparator) | `: \Closure` | 
[compose](#compose) | `: \Closure\|mixed` | 
[curryRight](#curryright) | `curryRight($callable): \Closure` | 
[first](#first) | `: mixed\|null` | 
[flatMap](#flatmap) | `: mixed` | 
[flip](#flip) | `: \Closure` | 
[get](#get) | `get($input, $prop): mixed` | 
[last](#last) | `: mixed\|null` | 
[lessThan](#lessthan) | `: bool` | 
[map](#map) | `: array` | 
[mapWith](#mapwith) | `mapWith($fn): \Closure` | 
[pair](#pair) | `: mixed` | 
[pipeLine](#pipeline) | `: \Closure` | 
[pluck](#pluck) | `: mixed` | 
[sum](#sum) | `: float\|int` | 
[walk](#walk) | `` | 

all
---

```php
: bool
```
If all the element of the list pass will return true
is any fail will return false


    Slaash\all([1, 3, 5], 'Slaash\isOdd');
    // === true
    Slaash\all([1, 3, 5], function ($n) { return $n != 3; });
    // === false
    Slash\all([], 'Dash\isOdd');
    // === true
    Slaash\all((object) ['a' => 1, 'b' => 3, 'c' => 5], 'Slash\isOdd');
    // === true
**Returns** | `bool` |
**Example:** If all the element of the list pass will return true
```php
is any fail will return false

@param $array
@param $test
@return bool

    Slaash\all([1, 3, 5], 'Slaash\isOdd');
    // === true
    Slaash\all([1, 3, 5], function ($n) { return $n != 3; });
    // === false
    Slash\all([], 'Dash\isOdd');
    // === true
    Slaash\all((object) ['a' => 1, 'b' => 3, 'c' => 5], 'Slash\isOdd');
    // === true
```
[↑ Top](#operations)
any
---

```php
: bool
```
Return true if at least one element matches the predicate

**Returns** | `bool` |
**Example:** Return true if at least one element matches the predicate
```php

@param $array
@param $test
@return bool
```
[↑ Top](#operations)
average
---

```php
: float|int|null
```

**Returns** | `float\|int\|null` |
**Example:** @param $list
```php
@return float|int|null
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

**Returns** | `\Closure` |
**Example:** Takes a binary comparison function
```php
and returns a version that adhere's to the Array#sort
API of return -1, 0 or 1 for sorting.

@param $fn
@return \Closure
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

echo $pipelines("hello world----");
// results "Hello world."

**Returns** | `\Closure\|mixed` |
**Example:** This function allows creating a new function from two functions passed into it
```php
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

echo $pipelines("hello world----");
// results "Hello world."

@return \Closure|mixed
```
[↑ Top](#operations)
curryRight
---

```php
curryRight($callable): \Closure
```
Returns a curried version of the function `fn`, with arguments
curried from right -> left.  Uses the natural arity of `fn` to
determine how many arguments to curry, or `n` if passed.

**Returns** | `\Closure` |
**Example:** Returns a curried version of the function `fn`, with arguments
```php
curried from right -> left.  Uses the natural arity of `fn` to
determine how many arguments to curry, or `n` if passed.

@param $callable
@return \Closure
```
[↑ Top](#operations)
first
---

```php
: mixed|null
```
Return the first / last element matching a predicate

**Returns** | `mixed\|null` |
**Example:** Return the first / last element matching a predicate
```php

@param $array
@param $test
@return mixed|null
```
[↑ Top](#operations)
flatMap
---

```php
: mixed
```
Return a flattened list which is the result of passing each
item in `list` thorugh the function `fn`

**Returns** | `mixed` |
**Example:** Return a flattened list which is the result of passing each
```php
item in `list` thorugh the function `fn`

@param $list
@param $fn
@return mixed
```
[↑ Top](#operations)
flip
---

```php
: \Closure
```
Returns a new function
that calls the original function with arguments reversed.

**Returns** | `\Closure` |
**Example:** Returns a new function
```php
that calls the original function with arguments reversed.

@param $fn
@return \Closure
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
last
---

```php
: mixed|null
```
return the last element of the array that match the predicate

**Returns** | `mixed\|null` |
**Example:** return the last element of the array that match the predicate
```php

@param $array
@param $test
@return mixed|null
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

**Returns** | `array` |
**Example:** Returns a new list by applying the function `fn` to each item
```php
in `list`

@param $list
@param $fn
@return array
```
[↑ Top](#operations)
mapWith
---

```php
mapWith($fn): \Closure
```

**Returns** | `\Closure` |
**Example:** @param $fn
```php
@return \Closure
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

Ex.,   pair([a,b], [c,d]) => [[a,c],[a,d],[b,c],[b,d]]

@param $list
@param $listFn
@return mixed
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
ie., pipeline(f,g,h) = h(g(f()))
@return \Closure
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
walk
---

```php

```


**Example:** @param $list
```php
@param $fn
```
[↑ Top](#operations)