<?php

namespace Slash;

function greaterThanOrEqualTo($to)
{
	return curryRight('Slash\greaterThanOrEqual', $to);
}
