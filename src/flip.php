<?php

namespace Slash;

/**
 *
 * Returns a new function
 * that calls the original function with arguments reversed.
 *
 * @param $fn
 * @return \Closure
 *
 * $add = function($number1, $number2, $number3) {
 *      return $number + $number2 + $number3;
 * };
 *
 * Slash\flip($add)(1,2,3); // === 6
 */
function flip($fn): \Closure
{
	return fn () => call_user_func_array($fn, array_reverse(func_get_args()));
}
