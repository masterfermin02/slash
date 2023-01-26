<?php

namespace Slash;

/**
 * @template TKey
 * @template TValue
 * @param array<TKey, TValue>|object &$list
 * @param callable $fn
 * @return void
 */
function walk(array|object &$list, callable $fn): void
{
	array_walk( $list, $fn);
}
