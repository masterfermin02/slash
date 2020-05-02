<?php

namespace Slash;

/**
 * Reverse of compose, taking it's arguments and chaining
 * them from left -> right
 *
 * @return \Closure
 *
 * @example
 *
 * ie., pipeline(f,g,h) = h(g(f()))
 *
 */
function pipeLine() {
    $args = func_get_args();
    return function ($items) use($args) {
        return call_user_func_array(flip('Slash\compose'), $args)($items);
    };
}
