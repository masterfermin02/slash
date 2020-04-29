<?php

namespace Slash;

function firstWith($fn)
{
    return curryRight('Slash\first',$fn);
}
