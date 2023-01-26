<?php

namespace Slash;

/**
 * @param callable $fn
 * @return callable
 */
function rejectWith(callable $fn): callable
{
	return curryRight('Slash\reject', $fn);
}
