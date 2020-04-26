<?php

namespace Slash;

function reduceWith($fn)
{
    return curry_right('Slash\reduce',$fn);
}
