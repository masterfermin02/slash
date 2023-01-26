<?php

namespace Slash;

function isOdd(int $number): bool
{
	return !isEven($number);
}
