<?php

namespace Slash;

/**
 * @param $fn
 * @return \Closure
 */
function filterWith($fn)
{
	return curryRight('Slash\filter', $fn);
}
