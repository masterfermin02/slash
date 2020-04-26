<?php

namespace Slash;

function firstWith($fn)
{
    return curry_right('Slash\first',$fn);
}
