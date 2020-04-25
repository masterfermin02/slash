<?php

namespace Slash;

/**
 *  If all the element of the list pass will return true
 *  is any fail will return false
 *
 * @param $array
 * @param $test
 * @return bool
 */
function all($array, $test) {

    if(is_null($array)) {
        return true;
    }

    foreach ($array as $v) {
        if (!call_user_func($test,$v)) {
            return false;
        }
    }

    return true;
}
