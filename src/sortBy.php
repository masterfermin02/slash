<?php

namespace Slash;

/**
 *
 * Sort a list using comparator function `fn`,
 * returns \Closure that returns new array (shallow copy) in sorted order.
 *
 * @param callable $fn
 * @return callable
 *
 * @example
 *
 * $descending = comparator(greaterThan);
 *
 * Slash\sortBy($descending)([1,2,3,4,5]); // === [5,4,3,2,1]
 *
 */
function sortBy(callable $fn): callable
{
	return curryRight('Slash\sort', $fn);
}

/**
 * @template TKey
 * @template TValue
 * @param array<TKey, TValue> $array
 *
 * @return array<TKey, TValue>
 */
function sortByDesc(array $array): array
{
	return sortBy(comparator('Slash\greaterThan'))($array);
}

/**
 * @template TKey
 * @template TValue
 * @param array<TKey, TValue> $array
 *
 * @return array<TKey, TValue>
 */
function sortByAsc(array $array): array
{
	return sortBy(comparator('Slash\lessThan'))($array);
}
