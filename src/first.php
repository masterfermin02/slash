<?php

namespace Slash;

/**
 *
 * Return the first / last element matching a predicate
 *
 * @template TKey
 * @template TValue
 * @param array<TKey, TValue> $list
 * @param ?callable $predicate
 * @return TValue
 *
 * @example
 *
 * Slash\first([1,2,3],function($number) { return $number === 2; }); // === 2
 *
 */
function first(array $list, ?callable $predicate = null)
{
	if (is_null($predicate)) {
		return !empty($list) ? $list[0] : null;
	}

	foreach ($list as $v) {
		if (call_user_func($predicate, $v)) {
			return $v;
		}
	}

	return null;
}
