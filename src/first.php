<?php

namespace Slash;

/**
 *
 * Return the first / last element matching a predicate
 *
 * @param $array
 * @param $test
 * @return mixed|null
 */
function first($array, $test) {

    if (is_null($array)) {
        return null;
    }

    if (is_object($array)) {
        $array = (array) $array;
    }

    foreach($array as $v)
        if(call_user_func($test,$v))
            return $v;
    return null;
}
