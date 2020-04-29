<?php

namespace Slash;

function pairWith($fn)
{
    return curryRight('Slash\pair',$fn);
}
