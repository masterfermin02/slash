<?php

namespace Slash;

/**
 *
 * Return new list as combination of the two lists passed
 * The second list can be a function which will be passed each item
 * from the first list and should return an array to combine against for that
 * item. If either argument is not a list, it will be treated as a list.
 *
 * @template TKey
 * @template TValue
 * @template TCallable
 * @param array<TKey, TValue> $list
 * @param TCallable $listFn
 * @return array<TKey, TValue>
 *
 * @example
 * Ex.,   pair([a,b], [c,d]) => [[a,c],[a,d],[b,c],[b,d]]
 */
function pair(array $list, $listFn): array
{
	is_array($list) || ($list = [$list]);
	(is_callable($listFn) || is_array($listFn)) || ($listFn = [$listFn]);

	return call_user_func(flatMapWith(function ($itemLeft) use ($listFn) {
		return call_user_func(mapWith(function ($itemRight) use ($itemLeft) {
			return [$itemLeft, $itemRight];
		}), is_callable($listFn) ? call_user_func($listFn, $itemLeft) : $listFn);
	}), $list);
}
