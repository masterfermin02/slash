<?php

namespace Slash;

/**
 * @template TKey
 * @template TValue
 * @param array<TKey, TValue> $list
 * @return array<TKey, TValue>
 */
function reject(array $list, callable $func)
{
	return filterWith(function ($item) use ($func): bool {
		return !$func($item);
	})($list);
}
