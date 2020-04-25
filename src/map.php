<?php

namespace Slash;

/**
 * Returns a new list by applying the function `fn` to each item
 * in `list`
 *
 * @param $list
 * @param $fn
 * @return array
 */
function map($list, $fn) {
    return array_map($fn,$list);
}
