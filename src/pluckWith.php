<?php

namespace Slash;

function pluckWith($fn)
{
    return curryRight('Slash\pluck',$fn);
}
