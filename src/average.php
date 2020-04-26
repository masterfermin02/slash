<?php

namespace Slash;


/**
 * @param $list
 * @return float|int|null
 */
function average($list) {

    $size = count($list);

    if ($size === 0) {
        return null;
    }

    return sum($list) / $size;
}
