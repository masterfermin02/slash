<?php

namespace Slash;

/**
 *
 * return the last element of the array that match the predicate
 *
 * @param $array
 * @param $test
 * @return mixed
 *
 * @example
 *
 * Slash\last([1,2,3],function($number) { return $number === 2; }); // === 2
 *
 */
function last($array, $test = null): mixed
{
	if (is_null($array)) {
		return null;
	}

	if (is_object($array)) {
		$array = (array) $array;
	}

	if (is_null($test)) {
		return first(array_reverse($array));
	}

	return first(array_reverse($array), $test);
}
