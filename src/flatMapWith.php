<?php

namespace Slash;

function flatMapWith($fn)
{
    return curry_right('flatMap',$fn);
}
