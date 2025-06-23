<?php

namespace Slash;

function rejectWith(callable $fn): callable
{
	return curryRight('Slash\reject', $fn);
}
