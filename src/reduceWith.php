<?php

namespace Slash;

/**
 * @param callable $fn
 *
 * @return callable
 */
function reduceWith(callable $fn): callable
{
	return curryRight('Slash\reduce', $fn);
}
