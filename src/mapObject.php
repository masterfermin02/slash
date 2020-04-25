<?php

namespace Slash;

// Returns a new object which is the result of mapping
// each *own* `property` of `obj` through function `fn`
function mapObject($obj, $fn) {
    $keys = is_array($obj) ? array_keys($obj) : get_object_vars($obj);
    return reduce($keys,function($res,$key) use($obj,$fn){
        $res[$key] = call_user_func_array( $fn, [$key, get($obj,$key)]);
        return $res;
    },[]);
}
