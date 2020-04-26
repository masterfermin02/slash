<?php

namespace Slash;

function groupBy($fn)
{
    return curry_right('Slash\group',$fn);
}
