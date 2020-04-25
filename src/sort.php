<?php

namespace Slash;

// Sort a list using comparator function `fn`,
// returns new array (shallow copy) in sorted order.
function sort($list, $fn) {

    usort($list, $fn);
    return $list;
}
