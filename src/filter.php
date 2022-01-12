<?php

namespace Slash;

/**
 *
 * Filter `list` using the predicate function `fn`
 *
 * @param $list
 * @param $fn
 * @return array
 *
 * @example
 *
 * Slash\filter([1,2,3],function($number) { return $number === 2; }); // === [2]
 *
 */
function filter($list, $fn): array
{
	if (is_null($list)) {
		return [];
	}

	if (is_object($list)) {
		$list = (array) $list;
	}

	return array_filter($list, $fn);
}
