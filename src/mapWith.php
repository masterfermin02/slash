<?php

namespace Slash;

/**
 *
 * Return \Closure that Returns a new list by applying the function `fn` to each item
 * @return \Closure
 * @example
 *
 * Slash\mapWith(function($x){ return $x+1; })([1,2,3]); // [2,3,4]
 */
function mapWith(callable $fn): callable
{
	return curryRight('Slash\map', $fn);
}
