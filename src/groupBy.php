<?php

namespace Slash;

function groupBy($fn)
{
    return curry_right('group',$fn);
}
