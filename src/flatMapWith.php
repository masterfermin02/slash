<?php

namespace Slash;

use JetBrains\PhpStorm\Pure;

/**
 * Return a curry version of the flatMap
 * @param \Closure $fn
 *
 * @return \Closure
 */
#[Pure]
function flatMapWith(\Closure $fn): \Closure
{
	return curryRight('Slash\flatMap', $fn);
}
