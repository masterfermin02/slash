<?php

namespace Slash;

/**
 * @template TValue
 * @param TValue $a
 * @param TValue $b
 */
function greaterThan($a, $b): bool
{
	return $a > $b;
}
