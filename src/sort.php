<?php

namespace Slash;

/**
 *
 * Sort a list using comparator function `fn`,
 * returns new array (shallow copy) in sorted order.
 *
 * @template TKey
 * @template TValue
 * @param array<TKey, TValue> $list
 * @return array<TKey, TValue>
 *
 * @example
 *
 * $descending = comparator(greaterThan);
 *
 * Slash\sort([1,2,3,4,5], $descending); // === [5,4,3,2,1]
 *
 */
function sort(array $list, callable $fn): array
{
	usort($list, $fn);
	return $list;
}
