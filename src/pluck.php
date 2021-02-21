<?php

namespace Slash;

/**
 * Given a list of objects, return a list of the values
 * for property 'prop' in each object
 * @param $list
 * @param $prop
 * @return mixed
 *
 */
function pluck($list, $prop)
{
	return reduce($list, function ($result, $element) use ($prop) {
		if (isset($element[$prop])) {
			$result[] = $element[$prop];
		}
		return $result;
	}, []);
}
