<?php

namespace Slash;

/**
 * @template TValue
 * @param TValue $a
 * @param TValue $b
 *
 * @return bool
 */
function greaterThan($a, $b): bool
{
	return $a > $b;
}
