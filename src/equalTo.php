<?php

namespace Slash;

/**
 *
 * Returns a curried version of the function of equal function
 *
 * @param $to
 * @return \Closure
 *
 * @example
 *
 * $equalToFive = equalTo(5);
 * $isEqualTo5 = $equalToFive(5); // true
 * $isEqualTo5 = $equalToFive(4); // false
 *
 */
function equalTo($to): \Closure
{
	return curryRight('Slash\equal', $to);
}
