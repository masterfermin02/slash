<?php

namespace Slash;

function flatMapWith($fn)
{
	return curryRight('Slash\flatMap', $fn);
}
