<?php

namespace Slash;

/**
 *
 * Return a copy of the array 'list' flattened by one level, ie [[1,2],[3,4]] = [1,2,3,4]
 *
 * @template TKey
 * @template TValue
 * @param array<TKey, TValue> $list
 * @return array<TKey, TValue>
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
