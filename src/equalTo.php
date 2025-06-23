<?php

namespace Slash;

/**
 *
 * Returns a curried version of the function of equal function
 *
 * @template TValue
 * @param TValue $to
 *
 * @example
 *
 * $equalToFive = equalTo(5);
 * $isEqualTo5 = $equalToFive(5); // true
 * $isEqualTo5 = $equalToFive(4); // false
 *
 */
function equalTo($to): callable
{
	return curryRight('Slash\equal', $to);
}
