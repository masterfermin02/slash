<?php

namespace Slash;

function curry_left($callable)
{
    $outerArguments = func_get_args();
    array_shift($outerArguments);

    return function() use ($callable, $outerArguments) {
        return call_user_func_array($callable, array_merge($outerArguments, func_get_args()));
    };
}
