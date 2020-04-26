<?php

namespace Slash;

/**
 * @param $fn
 * @return \Closure
 */
function mapWith($fn)
{
    return curry_right('Slash\map',$fn);
}
