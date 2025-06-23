<?php

namespace Slash;

/**
 * Returns a new list by applying the function `fn` to each item
 * in `list`
 *
 * @template TKey
 * @template TValue
 * @param array<TKey, TValue> $list
 * @return array<TKey, TValue>
 *
 * @example
 *
 * Slash\map([1,2,3], function($x){ return $x+1; }); // [2,3,4]
 *
 */
function map(array $list, callable $fn): array
{
	return array_map($fn, $list);
}
