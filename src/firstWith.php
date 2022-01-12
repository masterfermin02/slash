<?php

namespace Slash;

use JetBrains\PhpStorm\Pure;

/**
 * Returns a curried version of the function of first function
 *
 * @param mixed $fn
 *
 * @return \Closure
 */
#[Pure]
function firstWith(mixed $fn): \Closure
{
	return curryRight('Slash\first', $fn);
}
