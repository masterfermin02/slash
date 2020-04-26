<?php

namespace Slash;

function mapObjectWith($fn)
{
    return curry_right('Slash\mapObject',$fn);
}
