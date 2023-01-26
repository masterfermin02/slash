<?php

namespace Slash;

/**
 * @param  callable $fn
 *
 * @return callable
 */
function pairWith(callable $fn): callable
{
	return curryRight('Slash\pair', $fn);
}
