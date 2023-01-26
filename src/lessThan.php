<?php

namespace Slash;

/**
 * @template TValue
 * @param TValue $a
 * @param TValue $b
 * @return bool
 */
function lessThan($a, $b): bool
{
	return $a < $b;
}
