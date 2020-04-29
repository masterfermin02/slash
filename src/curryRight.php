<?php

namespace Slash;

/**
 *
 * Returns a curried version of the function `fn`, with arguments
 * curried from right -> left.  Uses the natural arity of `fn` to
 * determine how many arguments to curry, or `n` if passed.
 *
 * @param $callable
 * @return \Closure
 */
function curryRight($callable)
{
    $outerArguments = func_get_args();
    array_shift($outerArguments);

    return function() use ($callable, $outerArguments) {
        return call_user_func_array($callable, array_merge(func_get_args(), $outerArguments));
    };
}
