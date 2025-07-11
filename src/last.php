<?php

namespace Slash;

/**
 *
 * return the last element of the array that match the predicate
 *
 * @template TKey
 * @template TValue
 * @param array<TKey, TValue> $list
 * @return TValue|null
 *
 * @example
 *
 * Slash\last([1,2,3],function($number) { return $number === 2; }); // === 2
 *
 */
function last(array $list, ?callable $fn = null)
{
	if (is_null($fn)) {
		return first(array_reverse($list));
	}

	return first(array_reverse($list), $fn);
}
