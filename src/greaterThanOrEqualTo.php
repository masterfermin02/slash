<?php

namespace Slash;

/**
 * @template TValue
 * @param TValue $to
 *
 * @return callable
 */
function greaterThanOrEqualTo($to): callable
{
	return curryRight('Slash\greaterThanOrEqual', $to);
}
