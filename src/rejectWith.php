<?php

namespace Slash;

function rejectWith($fn)
{
    return curryRight('Slash\reject', $fn);
}
