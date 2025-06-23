<?php

namespace Slash;

/**
 *
 * Return a flattened list which is the result of passing each
 * item in `list` thorugh the function `fn`
 *
 * @template TKey
 * @template TValue
 * @param array<TKey, TValue> $list
 * @return array<TKey, TValue>
 *
 * @example
 *
 * Slash\flatMap([[1,2],[3,4]], function($x) { return $x + 1; }) // === [2,3,4,5]
 *
 */
function flatMap(array $list, callable $fn): array
{
	return flatten(map($list, $fn));
}
