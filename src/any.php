<?php

namespace Slash;

if (!function_exists('any')) {
    /**
     * Return true if at least one element matches the predicate
     *
     * @template TKey
     * @template TValue
     *
     * @param array<TKey, TValue> $array
     *
     *
     * @example
     *    Slash\any([1, 3, 5], 'Slash\isOdd'); // === true
     *
     *    Slash\any([1, 3, 5], function ($n) { return $n != 3; }); // === true
     *
     *    Slash\any([], 'Slash\isOdd'); // === false
     *
     *    Slash\any([2, 4, 8], 'Slash\isOdd'); // === false
     *
     *    Slash\any((object) ['a' => 1, 'b' => 3, 'c' => 5], 'Slash\isOdd'); // === true
     */
    function any(array $array, callable $predicate): bool
    {
        foreach ($array as $v) {
            if (call_user_func($predicate, $v)) {
                return true;
            }
        }

        return false;
    }
}
