<?php

namespace Slash;

/**
 * @template TValue
 * @param TValue $input
 * @param TValue $prop
 * @return TValue
 */
function get($input, $prop)
{
	if (is_null($input) || is_null($prop)) {
		return $prop;
	}

	if (is_callable($input)) {
		return call_user_func($input, $prop);
	}

	if (is_object($input)) {
		return $input->{ $prop } ?? $prop;
	}

	if (isset($input[$prop])) {
		return $input[$prop];
	}

	return $prop;
}
