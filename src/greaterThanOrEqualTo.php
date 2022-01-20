<?php

namespace Slash;

function greaterThanOrEqualTo(mixed $to): \Closure
{
	return curryRight('Slash\greaterThanOrEqual', $to);
}
