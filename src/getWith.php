<?php

namespace Slash;

/**
 * Return a curry version of get function
 * @param \Closure $fn
 *
 * @return \Closure
 */
function getWith(\Closure $fn): \Closure
{
	return curryRight('Slash\get', $fn);
}
