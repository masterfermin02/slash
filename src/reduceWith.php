<?php

namespace Slash;

function reduceWith(callable $fn): callable
{
	return curryRight('Slash\reduce', $fn);
}
