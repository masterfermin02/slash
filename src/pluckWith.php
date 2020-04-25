<?php

namespace Slash;

function pluckWith($fn)
{
    return curry_right('pluck',$fn);
}
