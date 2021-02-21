<?php

namespace Slash;

function reduceWith($fn)
{
	return curryRight('Slash\reduce', $fn);
}
