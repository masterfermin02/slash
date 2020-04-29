<?php

namespace Slash;

function sortBy($fn)
{
    return curryRight('Slash\sort',$fn);
}
