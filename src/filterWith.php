<?php

namespace Slash;

function filterWith($fn)
{
    return curry_right('filter',$fn);
}
