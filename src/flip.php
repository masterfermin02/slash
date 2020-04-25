<?php

namespace Slash;

function flip($fn) {

    return function() use($fn){
        $args = array_reverse(func_get_args());
        return call_user_func_array($fn, $args);
    };
}
