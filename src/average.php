<?php

namespace Slash;

/**
 *
 * Return the average of an array
 *
 * @param $list
 * @return float|int|null
 *
 * @example
	Slash\average([1, 3, 5]); // === 3
 */
function average($list)
{
	$size = count($list);

	if ($size === 0) {
		return null;
	}

	return sum($list) / $size;
}
