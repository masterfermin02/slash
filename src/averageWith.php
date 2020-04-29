<?php

namespace Slash;

function averageWith($fn) {
    return curryRight('Slash\average', $fn);
}
