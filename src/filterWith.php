<?php

namespace Slash;

function filterWith($fn)
{
    return curryRight('Slash\filter',$fn);
}
