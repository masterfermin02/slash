<?php

namespace Slash;

use Closure;

/**
 * @template TKey of array-key
 * @template TValue
 */
class Arrays
{

	/**
	 * Get the first n elements.
	 *
	 * @param array<TKey, TValue> $elements
	 * @param integer $amount
	 * @return array<TKey, TValue>|int
	 */
	public function first(array $elements, int $amount = 1): array|int
	{
		$elements = array_slice($elements, 0, $amount);

		return count($elements) == 1 ? reset($elements) : $elements;
	}

	/**
	 * Exclude the last n elements.
	 *
	 * @param array<TKey, TValue> $elements
	 * @param integer $amount
	 * @return array<TKey, TValue>
     */
	public function initial(array $elements, int $amount = 1): array
	{
		return array_slice($elements, 0, count($elements) - $amount);
	}

	/**
	 * Get the rest of the elements.
	 *
	 * @param array<TKey, TValue> $elements
	 * @param integer $index
	 * @return array<TKey, TValue>
     */
	public function rest(array $elements, int $index = 1): array
	{
		return array_slice($elements, $index);
	}

	/**
	 * Get the last n elements.
	 *
	 * @param array<TKey, TValue> $elements
	 * @param integer $amount
	 * @return array<TKey, TValue>|int
	 */
	public function last(array $elements,int $amount = 1): array|int
	{
		$elements = array_slice($elements, count($elements) - $amount);

		return count($elements) == 1 ? reset($elements) : $elements;
	}

	/**
	 * Remove falsy values.
	 *
	 * @param array<TKey, TValue> $elements
	 * @return array<TKey, TValue>
     */
	public function pack(array $elements): array
	{
		return array_values(array_filter($elements));
	}

	/**
	 * "Flatten" an array.
	 *
	 * @param array<TKey, TValue> $elements
	 * @return array<TKey, TValue>
     */
	public function flatten(array $elements): array
	{
		$level = [];

		foreach ($elements as $node) {
			if (is_array($node)) {
				$level = [...$level, ...$this->flatten($node)];
			} else {
				$level[] = $node;
			}
		}

		return $level;
	}

	/**
	 * Create an array containing a range of elements.
	 *
	 * @param integer $to
	 * @param integer $from
	 * @param integer $step
	 * @return array<TKey, TValue>
     */
	public function range(int $to, int $from = 0, int $step = 1): array
	{
		return range($from, $to, $step);
	}

	/**
	 * Compute the difference between the two.
	 *
	 * @param array<TKey, TValue> $one
	 * @param array<TKey, TValue> $another
	 * @return array<TKey, TValue>
     */
	public function difference(array $one, array $another): array
	{
		return array_values(array_diff($one, $another));
	}

	/**
	 * Remove duplicated values.
	 *
	 * @param array<TKey, TValue> $elements
	 * @param ?callable $iterator
	 * @return array<TKey, TValue>
     */
	public function unique(array $elements, ?callable $iterator = null): array
	{
		if (!is_null($iterator)) {
			return array_values(filter($elements, $iterator));
		}

		return array_values(array_unique($elements));
	}

	/**
	 * Remove all instances of $ignore found in $elements (=== is used).
	 *
	 * @param array<TKey, TValue> $elements
	 * @param array<TKey, TValue> $ignore
	 * @return array<TKey, TValue>
     */
	public function without(array $elements, array $ignore): array
	{
		return array_values(filter($elements, function ($node) use ($ignore) {
			return !in_array($node, $ignore, true);
		}));
	}

	/**
	 * Merge two arrays.
	 *
	 * @param array<TKey, TValue> $one
	 * @param array<TKey, TValue> $another
	 * @return array<TKey, TValue>
     */
	public function zip(array $one, array $another): array
	{
		return [...$one, ...$another];
	}

	/**
	 * Get the index of the first match.
	 *
     * @template TType
	 * @param array<TKey, TValue> $elements
	 * @param TType $element
	 * @return integer
	 */
	public function indexOf(array $elements, $element): int
	{
		return array_search($element, $elements, true);
	}

	/**
	 * Return the intersection of two arrays.
	 *
	 * @param array<TKey, TValue> $one
	 * @param array<TKey, TValue> $another
	 * @return array<TKey, TValue>
     */
	public function intersection(array $one, array $another): array
	{
		return array_values(array_intersect($one, $another));
	}

	/**
	 * Returns an array containing the unique items in both arrays.
	 *
	 * @param array<TKey, TValue> $one
	 * @param array<TKey, TValue> $another
	 * @return array<TKey, TValue>
     */
	public function union(array $one, array $another): array
	{
		return $this->unique($this->zip($one, $another));
	}
}
