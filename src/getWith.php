<?php

namespace Slash;

/**
 * Return a curry version of get function
 *
 */
function getWith(callable|string $fn): callable
{
	return curryRight('Slash\get', $fn);
}
