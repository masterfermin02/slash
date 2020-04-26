<?php

namespace Slash;

function flatMapWith($fn)
{
    return curry_right('Slash\flatMap',$fn);
}
