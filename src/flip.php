<?php

namespace Slash;

/**
 *
 * Returns a new function
 * that calls the original function with arguments reversed.
 *
 * @param $fn
 * @return \Closure
 */
function flip($fn) {

    return function() use($fn){
        $args = array_reverse(func_get_args());
        return call_user_func_array($fn, $args);
    };
}
