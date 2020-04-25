<?php

namespace Slash;

function getWith($fn)
{
    return curry_right('Slash\get',$fn);
}
