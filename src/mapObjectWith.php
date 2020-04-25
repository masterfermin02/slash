<?php

namespace Slash;

function mapObjectWith($fn)
{
    return curry_right('mapObject',$fn);
}
