<?php

namespace Slash;

/**
 * @template TKey
 * @template TValue
 * @param array<TKey, TValue> $list
 */
function sum(array $list): float|int
{
	return array_sum($list);
}
