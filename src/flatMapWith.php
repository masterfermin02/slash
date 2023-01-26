<?php

namespace Slash;

use JetBrains\PhpStorm\Pure;

/**
 * Return a curry version of the flatMap
 * @param callable $fn
 *
 * @return callable
 */
function flatMapWith(callable $fn): callable
{
	return curryRight('Slash\flatMap', $fn);
}
