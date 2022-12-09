<?php

namespace Slash;

use Closure;
use Countable;

class Collections
{

	/**
	 * Iterate through $collection using $iterator.
	 *
	 * @param array $collection
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
	 * @param array $collection
	 * @param Closure $iterator
	 * @return array
	 */
	public function map(array $collection, Closure $iterator): array
	{
		return map($collection, $iterator);
	}

	/**
	 * Convert $value to an array.
	 *
	 * @param mixed $value
	 * @return array
	 */
	public function toArray(mixed $value): array
	{
		return (array) $value;
	}

	/**
	 * Calculate the size of $value.
	 *
	 * @param array|Countable $value
	 * @return integer
	 */
	public function size(array|Countable $value): int
	{
        return count($value);
	}

	/**
	 * "Shuffle" the given $collection.
	 *
	 * @param array $collection
	 * @return array
	 */
	public function shuffle(array $collection): array
	{
		shuffle($collection);

		return $collection;
	}

	/**
	 * Check whether any values in $collection pass $iterator.
	 *
	 * @param array $collection
	 * @param Closure $iterator
	 * @return boolean
	 */
	public function any(array $collection, Closure $iterator): bool
	{
		return any($collection, $iterator);
	}

	/**
	 * Check whether all values in $collection pass $iterator.
	 *
	 * @param array $collection
	 * @param Closure $iterator
	 * @return boolean
	 */
	public function all(array $collection, Closure $iterator): bool
	{
		return all($collection, $iterator);
	}

	/**
	 * Run $iterator and remove all failing items in $collection.
	 *
	 * @param array $collection
	 * @param Closure $iterator
	 * @return array
	 */
	public function reject(array $collection, Closure $iterator): array
	{
		return array_values(reject($collection, $iterator));
	}

	/**
	 * Extract an array of values associated with $key from $collection.
	 *
	 * @param array $collection
	 * @param string $key
	 * @return array
	 */
	public function pluck(array $collection, string $key): array
	{
		return pluck($collection, $key);
	}

	/**
	 * Determine if $collection contains $value (=== is used).
	 *
	 * @param array $collection
	 * @param mixed $value
	 * @return boolean
	 */
	public function contains(array $collection, mixed $value): bool
	{
		return in_array($value, $collection, true);
	}

	/**
	 * Run $function across all elements in $collection.
	 *
	 * @param array $collection
	 * @param Closure $function
	 * @return array
	 */
	public function invoke(array $collection, Closure $function): array
	{
		return map($collection, $function);
	}

	/**
	 * Reduce $collection into a single value using $iterator.
	 *
	 * @param array $collection
	 * @param Closure $iterator
	 * @param mixed $initial
	 * @return mixed
	 */
	public function reduce(array $collection, Closure $iterator, int $initial = 0): mixed
	{
		return reduce($collection, $iterator, $initial);
	}

	/**
	 * Return $collection sorted in ascending order based on $iterator results.
	 *
	 * @param array $collection
	 * @param Closure $iterator
	 * @return array
	 */
	public function sortBy(array $collection, Closure $iterator): array
	{
		return sortBy($iterator)($collection);
	}

	/**
	 * Group values in $collection by $iterator's return value.
	 *
	 * @param array $collection
	 * @param Closure|string $iterator
	 * @return array
	 */
	public function groupBy(array $collection, Closure|string $iterator): array
	{
		return groupBy($iterator)($collection);
	}

	/**
	 * Return the maximum value from $collection.
	 *
	 * @param array $collection
	 * @return mixed
	 */
	public function max(array $collection): mixed
	{
		return first(sortByDesc($collection));
	}

	/**
	 * Return the minimum value from $collection.
	 *
	 * @param array $collection
	 * @return mixed
	 */
	public function min(array $collection): mixed
	{
		return first(sortByAsc($collection));
	}
}
