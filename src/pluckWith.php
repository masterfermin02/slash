<?php

namespace Slash;

function pluckWith(callable|string $fn): callable
{
	return curryRight('Slash\pluck', $fn);
}
