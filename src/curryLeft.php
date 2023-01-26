<?php

namespace Slash;

/**
 *
 * Returns a curried version of the function `fn`, with arguments
 * curried from left -> right.  Uses the natural arity of `fn` to
 * determine how many arguments to curry, or `n` if passed.
 *
 * @template TKey
 * @template TValue
 * @param callable $callable
 * @param array<TKey, TValue> ...$outerArguments
 * @return callable
 *
 * @example
 *
 * $greaterThan3 = function ($number) {
 *		return $number > 3;
 * };
 *
 * $filterGreaterThan3 = Slash\curryLeft('Slash\filter', $greaterThan3);
 *
 * $filteredNumber = $filterGreaterThan3([1, 2, 3, 4, ,5]) ; // === [4, 5]
 *
 */
function curryLeft(callable $callable, ...$outerArguments): callable
{
	return fn () => call_user_func_array($callable, [...$outerArguments, ...func_get_args()]);
}
