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

    if (is_null($list)) {
        return [];
    }

    if (is_object($list)) {
        $list = (array) $list;
    }

    return array_map($fn,$list);
}
