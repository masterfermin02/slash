<?php

namespace Slash;

/**
 * @param $obj
 * @param $prop
 * @return mixed
 */
function get($obj, $prop)
{
    if (is_callable($prop)) {
        return  call_user_func($prop, $obj);
    }

    if ( is_object($obj) && isset($obj->{ $prop })) {
        return  $obj->{ $prop };
    }

    if ( isset( $obj[ $prop ] ) ) {
        return $obj[ $prop ];
    }

    return $prop;
}
