<?php

namespace Slash;

function rejectWith($fn)
{
    return curry_right('Slash\reject', $fn);
}
