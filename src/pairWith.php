<?php

namespace Slash;

function pairWith($fn)
{
    return curry_right('Slash\pair',$fn);
}
