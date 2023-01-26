<?php

namespace Slash;

use Closure;
use Countable;

/**
 * @template TKey of array-key
 * @template TValue
 * @template TType
 */
class Collections
{

	/**
	 * Iterate through $collection using $iterator.
	 *
	 * @param array<TKey, TValue> $collection
	 * @param Closure $iterator
	 * @return void
	 */
	public function each(array $collection, Closure $iterator): void
	{
		walk($collection, $iterator);
	}

	/**
	 * "Map" through $collection using $iterator.
	 *
	 * @param array<TKey, TValue> $collection
	 * @param Closure $iterator
	 * @return array<int|string, TValue>
     */
	public function map(array $collection, Closure $iterator): array
	{
		return map($collection, $iterator);
	}

	/**
	 * Convert $value to an array.
	 * @param TType $value
	 * @return array<TKey, TValue>
     */
	public function toArray($value): array
	{
		return (array) $value;
	}

	/**
	 * Calculate the size of $value.
	 *
	 * @param array<TKey, TValue>|Countable $value
	 * @return integer
	 */
	public function size(array|Countable $value): int
	{
        return count($value);
	}

	/**
	 * "Shuffle" the given $collection.
	 *
	 * @param array<TKey, TValue> $collection
	 * @return array<TKey, TValue>
     */
	public function shuffle(array $collection): array
	{
		shuffle($collection);

		return $collection;
	}

	/**
	 * Check whether any values in $collection pass $iterator.
	 *
	 * @param array<TKey, TValue> $collection
	 * @param callable $iterator
	 * @return boolean
	 */
	public function any(array $collection, callable $iterator): bool
	{
		return any($collection, $iterator);
	}

	/**
	 * Check whether all values in $collection pass $iterator.
	 *
	 * @param array<TKey, TValue> $collection
	 * @param callable $iterator
	 * @return boolean
	 */
	public function all(array $collection, callable $iterator): bool
	{
		return all($collection, $iterator);
	}

	/**
	 * Run $iterator and remove all failing items in $collection.
	 *
	 * @param array<TKey, TValue> $collection
	 * @param callable $iterator
	 * @return array<TKey, TValue>
     */
	public function reject(array $collection, callable $iterator): array
	{
		return array_values(reject($collection, $iterator));
	}

	/**
	 * Extract an array of values associated with $key from $collection.
	 *
	 * @param array<TKey, TValue> $collection
	 * @param string $key
	 * @return mixed
     */
	public function pluck(array $collection, string $key): mixed
	{
		return pluck($collection, $key);
	}

	/**
	 * Determine if $collection contains $value (=== is used).
	 *
	 * @param array<TKey, TValue> $collection
	 * @param TType $value
	 * @return boolean
	 */
	public function contains(array $collection, $value): bool
	{
		return in_array($value, $collection, true);
	}

	/**
	 * Run $function across all elements in $collection.
	 *
	 * @param array<TKey, TValue> $collection
	 * @param callable $function
	 * @return array<int|string, TValue>
     */
	public function invoke(array $collection, callable $function): array
	{
		return map($collection, $function);
	}

	/**
	 * Reduce $collection into a single value using $iterator.
	 *
     * @template TReduceValue
	 * @param array<TKey,TValue> $collection
	 * @param callable(TReduceValue,TValue): TReduceValue $iterator
	 * @param TReduceValue $initial
	 * @return TReduceValue|TValue
	 */
	public function reduce(array $collection, callable $iterator, $initial = null)
	{
		return reduce($collection, $iterator, $initial);
	}

	/**
	 * Return $collection sorted in ascending order based on $iterator results.
	 *
	 * @param array<TKey, TValue> $collection
	 * @param callable $iterator
	 * @return array<TKey, TValue>
     */
	public function sortBy(array $collection, callable $iterator): array
	{
		return sortBy($iterator)($collection);
	}

	/**
	 * Group values in $collection by $iterator's return value.
	 *
	 * @param array<TKey, TValue> $collection
	 * @param mixed $iterator
	 * @return array<TKey, TValue>
     */
	public function groupBy(array $collection, mixed $iterator): array
	{
		return groupBy($iterator)($collection);
	}

	/**
	 * Return the maximum value from $collection.
	 *
	 * @param array<TKey, TValue> $collection
	 * @return TValue|null
	 */
	public function max(array $collection)
	{
		return first(sortByDesc($collection));
	}

	/**
	 * Return the minimum value from $collection.
	 *
	 * @param array<TKey, TValue> $collection
	 * @return TValue|null
	 */
	public function min(array $collection)
	{
		return first(sortByAsc($collection));
	}
}
