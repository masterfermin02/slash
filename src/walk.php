<?php

namespace Slash;

/**
 * @param $list
 * @param $fn
 * @return void
 */
function walk(&$list, $fn)
{
	array_walk($list, $fn);
}
