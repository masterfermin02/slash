<?php

namespace Slash;

function reduce($list, $fn, $initial = null)
{
	return array_reduce($list, $fn, $initial);
}
