<?php

namespace Slash;

/**
 *
 * Returns a curried version of the function `fn`, with arguments
 * curried from right -> left.  Uses the natural arity of `fn` to
 * determine how many arguments to curry, or `n` if passed.
 *
 * @param $callable
 * @param ...$outerArguments
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
function curryRight($callable, ...$outerArguments)
{
	return function () use ($callable, $outerArguments) {
		return call_user_func_array($callable, array_merge(func_get_args(), $outerArguments));
	};
}
