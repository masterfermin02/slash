<?php

namespace Slash;

if (!function_exists('comparator')) {
    /**
     *
     * Takes a binary comparison function
     * and returns a version that adhere's to the Array#sort
     * API of return -1, 0 or 1 for sorting.
     *
     * @param callable $fn
     *
     * @return callable
     *
     * @example
     *
     *  Slash\comparator(Slash\greaterThan([1, 0])) // === -1
     */
    function comparator(callable $fn): callable
    {
        return function ($a, $b) use ($fn) {
            if (call_user_func($fn, $a, $b)) {
                return -1;
            }
            if (call_user_func($fn, $b, $a)) {
                return 1;
            }
            return 0;
        };
    }
}
