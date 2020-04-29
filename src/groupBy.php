<?php

namespace Slash;

function groupBy($fn)
{
    return curryRight('Slash\group',$fn);
}
