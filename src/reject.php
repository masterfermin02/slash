<?php

namespace Slash;

/**
 * @param $list
 * @param $func
 * @return mixed
 */
function reject($list, $func) {

    return filterWith(function ($item) use ($func) {
        return !$func($item);
    })($list);

}
