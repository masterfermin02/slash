<?php

namespace Slash;

use JetBrains\PhpStorm\Pure;

/**
 * Returns a curried version of the function of first function
 *
 * @param callable|string $fn
 *
 * @return \Closure
 */
function firstWith(callable|string $fn): callable
{
	return curryRight('Slash\first', $fn);
}
