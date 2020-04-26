<?php

namespace Slash;

/**
 * Return true if at least one element matches the predicate
 *
 * @param $array
 * @param $test
 * @return bool
 */
function any($array, $test) {

    if (is_null($array)) {
        return false;
    }

    foreach($array as $v)
        if(call_user_func( $test,$v))
            return true;
    return false;
}
