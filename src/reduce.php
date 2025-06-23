<?php

namespace Slash;

/**
 *
 * @template TReduceValue
 * @template TKey
 * @template TValue
 * @param array<TKey,TValue> $list
 * @param callable(TReduceValue,TValue): TReduceValue $fn
 * @param TReduceValue $initial
 *
 * @return TReduceValue|TValue
 */
function reduce(array $list, $fn, $initial = null): mixed
{
	return array_reduce($list, $fn, $initial);
}
