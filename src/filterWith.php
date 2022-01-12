<?php

namespace Slash;

/**
 * @param $fn
 * @return \Closure
 */
function filterWith($fn): \Closure
{
	return curryRight('Slash\filter', $fn);
}
