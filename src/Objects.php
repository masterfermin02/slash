<?php

namespace Slash;

use Closure;
use Traversable;
use ReflectionClass;
use ReflectionMethod;
use DateTime;
use ReflectionException;

/**
 * @template TKey
 * @template TValue
 * @template TType
 */
class Objects
{

	/**
     * Invoke $closure on $object, then return $object.
     *
     * @param TType $object
     * @return TType
     */
    public function apply($object, callable $closure)
	{
		$closure($object);

		return $object;
	}

	/**
     * Determine whether the given object has a key.
     *
     * @param TType $object
     */
    public function has($object, string $key): bool
	{
		return in_array($key, $this->keys($object));
	}

	/**
	 * Get the keys.
	 *
	 * @param TType $object
	 * @return array<int, (int|string)>
	 */
	public function keys($object): array
	{
		return array_keys((array) $object);
	}

	/**
	 * Get the values.
	 *
	 * @param TType $object
	 * @return array<int, mixed>
	 */
	public function values($object): array
	{
		return array_values((array) $object);
	}

	/**
	 * Copy all properties from $source to $destination.
	 *
	 * @param TType $source
	 * @param TType $destination
	 * @return TType
	 */
	public function extend($source, $destination)
	{
		foreach ($source as $key => $value) {
			$destination->{$key} = $value;
		}

		return $destination;
	}

	/**
	 * Fill in any missing values using $defaults.
	 *
	 * @param object $object
	 * @param mixed $defaults
	 * @return object
	 */
	public function defaults($object, $defaults)
	{
		if (is_array($defaults)) {
			foreach ($defaults as $default) {
				$this->defaults($object, $default);
			}

			return $object;
		}

        if (is_iterable($defaults)) {
            foreach ($defaults as $key => $value) {
                if (!property_exists($object, $key)) {
                    $object->{$key} = $value;
                }
            }
        }

		return $object;
	}

	/**
	 * Return a copy of $value.
	 *
	 * @param TType $value
	 * @return TType
	 */
	public function copy($value)
	{
		return is_object($value) ? (clone $value) : $value;
	}


	/**
	 * Get the names of all public methods.
	 *
	 * @param object $object
	 * @return array<int, ReflectionMethod>
	 */
	public function methods($object): array
	{
		$methods = (new ReflectionClass($object))->getMethods(ReflectionMethod::IS_PUBLIC);

		$iterator = function (ReflectionMethod $method): string {
			return $method->getName();
		};

		return map($methods, $iterator);
	}

	/**
     * Determine whether the given value is null.
     *
     * @param TType $value
     */
    public function isNull($value): bool
	{
		return is_null($value);
	}

	/**
     * Determine whether the given value is traversable.
     *
     * @param TType $value
     */
    public function isTraversable($value): bool
	{
		return is_array($value) || $value instanceof Traversable;
	}

	/**
     * Determine whether the given value is an array.
     *
     * @param TType $value
     */
    public function isArray($value): bool
	{
		return is_array($value);
	}

	/**
     * Determine whether the given value is an instance of \DateTime.
     *
     * @param TType $value
     */
    public function isDate($value): bool
	{
		return ($value instanceof DateTime);
	}

	/**
     * Determine whether the given value is a float or an integer.
     *
     * @param TType $value
     */
    public function isNumber($value): bool
	{
		return is_int($value) || is_float($value);
	}

	/**
     * Determine whether the given value is a boolean.
     *
     * @param TType $value
     */
    public function isBoolean($value): bool
	{
		return is_bool($value);
	}

	/**
     * Determine whether the given value is a string.
     *
     * @param TType $value
     */
    public function isString($value): bool
	{
		return is_string($value);
	}

	/**
     * Determine whether the given value is an instance of \Closure.
     *
     * @param TType $value
     */
    public function isFunction($value): bool
	{
		return ($value instanceof Closure);
	}

	/**
     * Determine whether the given value is an object.
     *
     * @param TType $value
     */
    public function isObject($value): bool
	{
		return is_object($value);
	}

	/**
     * Compare two values using === (strict mode).
     *
     * @param TType $left
     * @param TType $right
     */
    public function isEqual($left, $right): bool
	{
		return ($left) === $right;
	}

	/**
     * Determine whether the given value is empty.
     *
     * @param TType $value
     */
    public function isEmpty($value): bool
	{
		return empty($value);
	}
}
