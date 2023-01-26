<?php

namespace Slash;

/**
 * Return a curry version of get function
 * @param callable|string $fn
 *
 * @return callable
 */
function getWith(callable|string $fn): callable
{
	return curryRight('Slash\get', $fn);
}
