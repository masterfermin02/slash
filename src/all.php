<?php

namespace Slash;

/**
 *  Return true only If all the element of the list pass the predicate
 *
 * @param $array
 * @param $predicate
 * @return bool
 *
 * @example
 * Slash\all([1, 3, 5], 'Slash\isOdd'); // === true
 *
 *	Slash\all([1, 3, 5], function ($n) { return $n != 3; }); // === false
 *
 *	Slash\all([], 'Slash\isOdd'); // === true
 *
 *	Slash\all((object) ['a' => 1, 'b' => 3, 'c' => 5], 'Slash\isOdd'); // === true
 */
function all(array|\ArrayObject $array, $predicate): bool
{
	foreach ($array as $v) {
		if (!call_user_func($predicate, $v)) {
			return false;
		}
	}

	return true;
}
