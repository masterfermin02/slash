<?php

namespace Slash;

function getWith($fn)
{
	return curryRight('Slash\get', $fn);
}
