<?php

namespace Slash;

function reject($list, $func) {

    return filterWith(function ($item) use ($func) {
        return call_user_func($func, $item);
    })($list);

}
