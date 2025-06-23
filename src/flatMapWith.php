<?php

namespace Slash;

use JetBrains\PhpStorm\Pure;

/**
 * Return a curry version of the flatMap
 *
 */
function flatMapWith(callable $fn): callable
{
	return curryRight('Slash\flatMap', $fn);
}
