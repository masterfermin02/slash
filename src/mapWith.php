<?php

namespace Slash;

/**
 * @param $fn
 * @return \Closure
 */
function mapWith($fn)
{
    return curryRight('Slash\map',$fn);
}
