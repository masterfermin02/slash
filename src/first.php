<?php

namespace Slash;

/**
 *
 * Return the first / last element matching a predicate
 *
 * @param $array
 * @param $predicate
 * @return mixed|null
 *
 * @example
 *
 * Slash\first([1,2,3],function($number) { return $number === 2; }); // === 2
 *
 */
function first($array, $predicate = null)
{
	if (is_null($array)) {
		return null;
	}

	if (is_object($array)) {
		$array = (array) $array;
	}

	if (is_null($predicate)) {
		return $array[0];
	}

	foreach ($array as $v) {
		if (call_user_func($predicate, $v)) {
			return $v;
		}
	}
	return null;
}
