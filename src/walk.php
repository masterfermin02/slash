<?php

namespace Slash;

/**
 * @template TList
 * @param TList &$list
 * @param callable $fn
 * @return void
 */
function walk(&$list, callable $fn)
{
	array_walk($list, $fn);
}
