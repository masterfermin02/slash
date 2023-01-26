<?php

namespace Slash;

/**
 * @template TKey
 * @template TValue
 * @param array<TKey, TValue> $list
 * @return float|int
 */
function sum(array $list): float|int
{
	return array_sum($list);
}
