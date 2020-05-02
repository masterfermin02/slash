<?php

namespace Slash;

/**
 *
 * Sort a list using comparator function `fn`,
 * returns new array (shallow copy) in sorted order.
 *
 * @param $list
 * @param $fn
 * @return mixed
 *
 * @example
 *
 * $descending = comparator(greaterThan);
 *
 * Slash\sort([1,2,3,4,5], $descending); // === [5,4,3,2,1]
 *
 */
function sort($list, $fn) {

    usort($list, $fn);
    return $list;
}
