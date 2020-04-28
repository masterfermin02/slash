<?php

namespace Slash;

function reject($list, $func) {

    return filterWith(function ($item) use ($func) {
        return !$func($item);
    })($list);

}
