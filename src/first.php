<?php

namespace Slash;

// Return the first / last element matching a predicate
function first(array $array, $test) {
    foreach($array as $v)
        if(call_user_func($test,$v))
            return $v;
    return null;
}
