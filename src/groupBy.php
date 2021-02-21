<?php

namespace Slash;

/**
 *
 * Returns an object which groups objects in `list` by property `prop`. If
 * `prop` is a function, will group the objects in list using the string returned
 * by passing each obj through `prop` function.
 *
 * @param $fn
 * @return \Closure
 *
 * @example
 *
 *  Slash\groupBy(function($number) {
 *    return Slash\even($number) ? 'Even' : 'Odd';
 * })([1,2,3]);
 * // === [
 *              'Even' => [2]
 *              'Odd' => [1,3]
 *        ]
 *
 *
 * =====================================================
 * use function Slash\groupBy;
 *
 * $records = [
 * 	['id' => 1, 'value1' => 5, 'value2' => 10],
 * 	['id' => 2, 'value1' => 50, 'value2' => 100],
 * 	['id' => 1, 'value1' => 2, 'value2' => 2],
 * 	['id' => 2, 'value1' => 15, 'value2' => 20],
 * 	['id' => 3, 'value1' => 15, 'value2' => 20],
 * ];
 *
 * function groupById($list)
 * {
 *  	return groupBy('id')($list);
 * }
 *
 * $grouped = groupById($records);
 *
 * resultado :    [
 * 		1 => [ [ "id" => 1, "value1" => 5, "value2" => 10 ], [ "id" => 1, "value1" => 1, "value2" => 2 ] ],
 * 		2 => [ [ "id" => 2, "value1" => 50, "value2" => 100 ], [ "id" => 2, "value1" => 15, "value2" => 20 ] ],
 * 		3 => [ [ "id" => 3, "value1" => 15, "value2" => 20 ] ]
 * ];
 */
function groupBy($fn)
{
	return curryRight('Slash\group', $fn);
}
