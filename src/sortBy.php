<?php

namespace Slash;

function sortBy($fn)
{
    return curry_right('sort',$fn);
}
