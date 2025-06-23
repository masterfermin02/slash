<?php

namespace Slash;

/**
 *
 * Filter `list` using the predicate function `fn`
 *
 * @template TKey
 * @template TValue
 * @param array<TKey, TValue> $list
 * @return array<TKey, TValue>
 *
 * @example
 *
 * Slash\filter([1,2,3],function($number) { return $number === 2; }); // === [2]
 *
 */
function filter(array $list, callable $fn): array
{
	return array_filter($list, $fn);
}
