<?php

namespace Slash;

/**
 * @param $array
 * @param $test
 * @return bool
 */
function all($array, $test) {
    foreach($array as $v)
        if(! call_user_func( $test,$v))
            return false;
    return true;
}
