<?php

namespace Slash;

/**
 * Simple comparison for '>='
 *
 * @param $a
 * @param $b
 * @return bool
 *
 * @example
 *
 * $greaterThanOrEqualFive = greaterThanOrEqual(5, 5); // === true
 * */
function greaterThanOrEqual($a, $b)
{
	return $a >= $b;
}
