<?php

namespace Slash;

/**
 * Compare if value $a is equal to $b
 *
 * @template TValue
 * @param TValue $a
 * @param TValue $b
 *
 * @example
 *
 * equal(1, 2); // false
 * equal(1,1); // true
 */
function equal($a, $b): bool
{
	return $a === $b; }
