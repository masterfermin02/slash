<?php

namespace Slash;

/**
 *
 * Return a flattened list which is the result of passing each
 * item in `list` thorugh the function `fn`
 *
 * @param $list
 * @param $fn
 * @return mixed
 */
function flatMap($list, $fn) {
    return flatten(map($list, $fn));
}
