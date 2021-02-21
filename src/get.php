<?php

namespace Slash;

/**
 * @param $input
 * @param $prop
 * @return mixed
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
		return isset($input->{ $prop }) ? $input->{ $prop } : $prop;
	}

	if (isset($input[$prop])) {
		return $input[$prop];
	}

	return $prop;
}
