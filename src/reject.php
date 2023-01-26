<?php

namespace Slash;

/**
 * @template TKey
 * @template TValue
 * @param array<TKey, TValue> $list
 * @param callable $func
 * @return array<TKey, TValue>
 */
function reject(array $list, callable $func)
{
	return filterWith(function ($item) use ($func) {
		return !$func($item);
	})($list);
}
