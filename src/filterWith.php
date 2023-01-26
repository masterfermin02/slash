<?php

namespace Slash;

/**
 * @param callable $fn
 * @return callable
 */
function filterWith(callable $fn): callable
{
	return curryRight('Slash\filter', $fn);
}
