<?php

namespace Slash;

/**
 *
 * @template TReduceValue
 * @template TCarry
 * @template TItem
 * @template TKey
 * @template TValue
 * @param array<TKey,TValue> $list
 * @param callable(TCarry,TItem): TReduceValue $fn
 * @param TValue $initial
 *
 * @return TReduceValue
 */
function reduce(array $list, callable $fn, $initial = null)
{
	return array_reduce($list, $fn, $initial);
}
