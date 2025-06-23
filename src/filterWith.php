<?php

namespace Slash;

function filterWith(callable $fn): callable
{
	return curryRight('Slash\filter', $fn);
}
