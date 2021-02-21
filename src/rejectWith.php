<?php

namespace Slash;

/**
 * @param $fn
 * @return \Closure
 */
function rejectWith($fn)
{
	return curryRight('Slash\reject', $fn);
}
