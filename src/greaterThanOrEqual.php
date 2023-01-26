<?php

namespace Slash;

/**
 * Simple comparison for '>='
 *
 * @template TValue
 * @param TValue $a
 * @param TValue $b
 * @return bool
 *
 * @example
 *
 * $greaterThanOrEqualFive = greaterThanOrEqual(5, 5); // === true
 * */
function greaterThanOrEqual($a, $b): bool
{
	return $a >= $b;
}
