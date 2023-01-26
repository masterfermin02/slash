<?php

namespace Slash;

/**
 * Given a list of objects, return a list of the values
 * for property 'prop' in each object
 *
 * @template TKey
 * @template TValue
 * @template TType
 * @param array<TKey, TValue> $list
 * @param TType $prop
 * @return mixed
 *
 */
function pluck(array $list, $prop)
{
	return reduce($list, function ($result, $element) use ($prop) {
		if (isset($element[$prop])) {
			$result[] = $element[$prop];
		}
		return $result;
	}, []);
}
