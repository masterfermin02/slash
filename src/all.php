<?php

namespace Slash;

/**
 *  If all the element of the list pass will return true
 *  is any fail will return false
 *
 * @param $array
 * @param $test
 * @return bool
 *
 * @example
    Slaash\all([1, 3, 5], 'Slaash\isOdd');
    // === true
    Slaash\all([1, 3, 5], function ($n) { return $n != 3; });
    // === false
    Slash\all([], 'Dash\isOdd');
    // === true
    Slaash\all((object) ['a' => 1, 'b' => 3, 'c' => 5], 'Slash\isOdd');
    // === true
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
