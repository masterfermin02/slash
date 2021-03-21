<?php

namespace Slash;

/**
 *
 * Sort a list using comparator function `fn`,
 * returns \Closure that returns new array (shallow copy) in sorted order.
 *
 * @param $fn
 * @return \Closure
 *
 * @example
 *
 * $descending = comparator(greaterThan);
 *
 * Slash\sortBy($descending)([1,2,3,4,5]); // === [5,4,3,2,1]
 *
 */
function sortBy($fn)
{
	return curryRight('Slash\sort', $fn);
}


function sortByDesc($array) {
	return sortBy(comparator('Slash\greaterThan'))($array);
}

function sortByAsc($array) {
	return sortBy(comparator('Slash\lessThan'))($array);
}