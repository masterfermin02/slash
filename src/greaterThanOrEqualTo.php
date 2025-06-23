<?php

namespace Slash;

/**
 * @template TValue
 * @param TValue $to
 */
function greaterThanOrEqualTo($to): callable
{
	return curryRight('Slash\greaterThanOrEqual', $to);
}
