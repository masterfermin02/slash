<?php

namespace Slash;

function compose() {
    $args = func_get_args();
    $fn = array_shift($args);
    $gn = array_shift($args);
    $fog = $gn ? function() use($fn,$gn) { return call_user_func($fn,call_user_func_array($gn,func_get_args())); }
        : $fn;

    return count($args) > 0 ? call_user_func_array('compose', array_merge([$fog],$args)) : $fog;
}
