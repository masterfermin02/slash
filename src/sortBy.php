<?php

namespace Slash;

function sortBy($fn)
{
    return curry_right('Slash\sort',$fn);
}
