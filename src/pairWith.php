<?php

namespace Slash;

function pairWith(callable $fn): callable
{
	return curryRight('Slash\pair', $fn);
}
