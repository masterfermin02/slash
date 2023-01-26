<?php

namespace Slash;

use http\Exception\InvalidArgumentException;

/**
 * Reverse of compose, taking it's arguments and chaining
 * them from left -> right
 *
 * @return callable
 *
 * @example
 *
 * ie., pipeline(f,g,h) = h(g(f()))
 *
 */
function pipeLine(): callable
{
	$args = func_get_args();
	return function ($items) use ($args) {
        $fn = call_user_func_array(flip('Slash\compose'), $args);

        if (!is_callable($fn)) {
            throw new InvalidArgumentException('Function not found');
        }

		return $fn($items);
	};
}
