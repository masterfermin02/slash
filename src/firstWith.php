<?php

namespace Slash;

use JetBrains\PhpStorm\Pure;

/**
 * Returns a curried version of the function of first function
 *
 *
 * @return \Closure
 */
function firstWith(callable|string $fn): callable
{
	return curryRight('Slash\first', $fn);
}
