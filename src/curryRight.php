<?php

namespace Slash;

if (!function_exists('curryRight')) {
    /**
     *
     * Returns a curried version of the function `fn`, with arguments
     * curried from right -> left.  Uses the natural arity of `fn` to
     * determine how many arguments to curry, or `n` if passed.
     *
     * @template TKey
     * @template TValue
     *
     * @param array<TKey, TValue> ...$outerArguments
     *
     * @return \Closure
     *
     * @example
     *
     * $greaterThan3 = function ($number) {
     *  return $number > 3;
     * };
     *
     * $filterGreaterThan3 = Slash\curryRight('Slash\filter', $greaterThan3);
     *
     * $filteredNumber = $filterGreaterThan3([1, 2, 3, 4, ,5]) ; // === [4, 5]
     *
     */
    function curryRight(callable $callable, ...$outerArguments): callable
    {
        return fn(): mixed => call_user_func_array($callable, [...func_get_args(), ...$outerArguments]);
    }
}
