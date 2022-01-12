<?php

namespace Slash;

/**
 *
 * Return a copy of the array 'list' flattened by one level, ie [[1,2],[3,4]] = [1,2,3,4]
 *
 * @param array $list
 * @return array
 *
 * @example
 *
 * Slash\flatten([[1,2],[3,4]]) // === [1,2,3,4]
 *
 */
function flatten(array $list): array
{
	return reduce($list, fn ($items, $item) => is_array($item) ? [...$items, ...$item] : $item, []);
}
