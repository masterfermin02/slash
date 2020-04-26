<?php

namespace Slash;

function filterWith($fn)
{
    return curry_right('Slash\filter',$fn);
}
