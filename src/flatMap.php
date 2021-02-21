<?php

namespace Slash;

/**
 *
 * Return a flattened list which is the result of passing each
 * item in `list` thorugh the function `fn`
 *
 * @param $list
 * @param $fn
 * @return mixed
 *
 * @example
 *
 * Slash\flatMap([[1,2],[3,4]], function($x) { return $x + 1; }) // === [2,3,4,5]
 *
 */
function flatMap($list, $fn)
{
	return flatten(map($list, $fn));
}
