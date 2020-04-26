<?php

namespace Slash;

// Filter `list` using the predicate function `fn`
function filter($list, $fn) {

    if (is_null($list)) {
        return [];
    }

    if (is_object($list)) {
        $list = (array) $list;
    }

    return array_filter($list,$fn);
}
