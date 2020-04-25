<?php

namespace Slash;

// Similar to Ramda's useWith(fn,...) which allows you to supply
// a function `fn`, along with one or more transform functions. When
// the returned function is called, it will each argument passed to `fn`
// using the correlating transform function - if there are more arguments
// than transform functions, those arguments will be passed as is.
function useWith($fn /*, txfn, ... */) {
    $transforms = func_get_args();
    array_shift($transforms);
    $_transform = function($args) use($transforms) {
        return array_map(function($arg,$i) use($transforms) {
            return $transforms[$i]($arg);
        },$args,array_keys($args));
    };
    return function() use($_transform,$transforms,$fn) {
        $args = func_get_args();
        $transformsLen = count($transforms);
        $targs = array_slice($args,0,$transformsLen);
        $remaining = array_slice($args,$transformsLen);

        return call_user_func_array($fn, array_merge(call_user_func($_transform,$targs), $remaining));
    };
}
