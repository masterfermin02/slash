<?php

namespace Slash;

/**
 *
 * Return the first / last element matching a predicate
 *
 * @template TKey
 * @template TValue
 * @param array<TKey, TValue> $list
 * @return TValue|null
 *
 * @example
 *
 * Slash\first([1,2,3],function($number) { return $number === 2; }); // === 2
 *
 */
function first(array $list, ?callable $predicate = null)
{
	if (is_null($predicate)) {
		return $list === [] ? null : $list[0];
	}

	foreach ($list as $v) {
		if (call_user_func($predicate, $v)) {
			return $v;
		}
	}

	return null;
}
