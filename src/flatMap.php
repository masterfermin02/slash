<?php

namespace Slash;

/**
 *
 * Return a flattened list which is the result of passing each
 * item in `list` thorugh the function `fn`
 *
 * @param array $list
 * @param \Closure $fn
 * @return array
 *
 * @example
 *
 * Slash\flatMap([[1,2],[3,4]], function($x) { return $x + 1; }) // === [2,3,4,5]
 *
 */
function flatMap(array $list, \Closure $fn): array
{
	return flatten(map($list, $fn));
}
