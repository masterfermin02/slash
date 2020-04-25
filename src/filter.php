<?php

namespace Slash;

// Filter `list` using the predicate function `fn`
function filter($list, $fn) {
    return array_filter($list,$fn);
}
