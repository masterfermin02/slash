<?php

namespace Slash;

/**
 *
 * Return \Closure that Returns a new list by applying the function `fn` to each item
 * @param $fn
 * @return \Closure
 *
 * @example
 *
 * Slash\mapWith(function($x){ return $x+1; })([1,2,3]); // [2,3,4]
 */
function mapWith($fn)
{
	return curryRight('Slash\map', $fn);
}
