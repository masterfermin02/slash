<?php

namespace Slash;

/**
 * Return a curry version of get function
 * @param \Closure|string $fn
 *
 * @return \Closure
 */
function getWith(\Closure|string $fn): \Closure
{
	return curryRight('Slash\get', $fn);
}
