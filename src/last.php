<?php

namespace Slash;

/**
 *
 * return the last element of the array that match the predicate
 *
 * @param $array
 * @param $test
 * @return mixed|null
 */
function last($array, $test) {

    if (is_null($array)) {
        return null;
    }

    if (is_object($array)) {
        $array = (array) $array;
    }

    return first(array_reverse($array), $test);
}
