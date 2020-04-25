<?php

namespace Slash;

// Return true if at least one element matches the predicate
function any($array, $test) {
    foreach($array as $v)
        if(call_user_func( $test,$v))
            return true;
    return false;
}
