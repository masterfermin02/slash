<?php

namespace Slash\Exceptions;

/**
 * @template TKey
 * @template TValue
 */
// @codingStandardsIgnoreStart
class InvalidArgumentException extends \InvalidArgumentException
{
	/**
	 * @param callable $callback
	 * @param string $callee
	 * @param int $parameterPosition
	 * @throws InvalidArgumentException
	 * @return void
	 */
	public static function assertCallback(callable $callback, string $callee, int $parameterPosition): void
	{
		if (!is_callable($callback)) {
			if (!is_array($callback)) {
				throw new InvalidArgumentException(
					sprintf(
						'%s() expected parameter %d to be a valid callback, no array, string, closure or functor given',
						$callee,
						$parameterPosition
					)
				);
			}

            if (!is_string($callback)) {
                throw new InvalidArgumentException(
                    sprintf(
                        '%s() expected parameter %d to be a valid callback, no array, string, closure or functor given',
                        $callee,
                        $parameterPosition
                    )
                );
            }

			$type = gettype($callback);
			switch ($type) {
			case 'array':
				$type = 'method';
				$callback = array_values($callback);

				$sep = '::';
				if (is_object($callback[0])) {
					$callback[0] = get_class($callback[0]);
					$sep = '->';
				}

				$callback = implode($sep, $callback);
					break;

            default:
                $type = 'function';
					break;
			}

			throw new InvalidArgumentException(
				sprintf(
					"%s() expects parameter %d to be a valid callback, %s '%s' not found or invalid %s name",
					$callee,
					$parameterPosition,
					$type,
					$callback,
					$type
				)
			);
		}
	}

    /**
     * @param TValue $collection
     * @param string $callee
     * @param int $parameterPosition
     *
     * @return void
     */
	public static function assertCollection($collection, string $callee, int $parameterPosition): void
	{
		self::assertCollectionAlike($collection, 'Traversable', $callee, $parameterPosition);
	}

    /**
     * @param TValue $collection
     * @param string $callee
     * @param int $parameterPosition
     *
     * @return void
     */
	public static function assertArrayAccess($collection, string $callee, int $parameterPosition): void
	{
		self::assertCollectionAlike($collection, 'ArrayAccess', $callee, $parameterPosition);
	}

    /**
     * @param TValue $methodName
     * @param string $callee
     * @param string $parameterPosition
     *
     * @return void
     */
	public static function assertMethodName($methodName, string $callee, string $parameterPosition): void
	{
		if (!is_string($methodName)) {
			throw new InvalidArgumentException(
				sprintf(
					'%s() expects parameter %d to be string, %s given',
					$callee,
					$parameterPosition,
					self::getType($methodName)
				)
			);
		}
	}

	/**
	 * @param TValue $propertyName
	 * @param string $callee
	 * @param integer $parameterPosition
	 * @throws InvalidArgumentException
	 */
	public static function assertPropertyName($propertyName, string $callee, int $parameterPosition): void
	{
		if (!is_string($propertyName)
			&& !is_int($propertyName)
			&& !is_float($propertyName)
			&& !is_null($propertyName)
		) {
			throw new InvalidArgumentException(
				sprintf(
					'%s() expects parameter %d to be a valid property name or array index, %s given',
					$callee,
					$parameterPosition,
					self::getType($propertyName)
				)
			);
		}
	}

    /**
     * @param TValue $value
     * @param string $callee
     * @param int $parameterPosition
     *
     * @return void
     */
	public static function assertPositiveInteger($value, string $callee, int $parameterPosition): void
	{
		if ((string) (int) $value !== (string) $value || $value < 0) {
			$type = self::getType($value);
			$type = $type === 'integer' ? 'negative integer' : $type;

			throw new InvalidArgumentException(
				sprintf(
					'%s() expects parameter %d to be positive integer, %s given',
					$callee,
					$parameterPosition,
					$type
				)
			);
		}
	}

	/**
	 * @param TValue $key
	 * @param string $callee
	 * @throws static
	 */
	public static function assertValidArrayKey($key, string $callee): void
	{
		$keyTypes = ['NULL', 'string', 'integer', 'double', 'boolean'];

		$keyType = gettype($key);

		if (!in_array($keyType, $keyTypes, true)) {
			throw new InvalidArgumentException(
				sprintf(
					'%s(): callback returned invalid array key of type "%s". Expected %4$s or %3$s',
					$callee,
					$keyType,
					array_pop($keyTypes),
					implode(', ', $keyTypes)
				)
			);
		}
	}

    /**
     * @param TValue $collection
     * @param string $key
     * @param string $callee
     *
     * @return void
     */
	public static function assertArrayKeyExists($collection, string $key, string $callee): void
	{
		if (!isset($collection[$key])) {
			throw new InvalidArgumentException(
				sprintf(
					'%s(): unknown key "%s"',
					$callee,
					$key
				)
			);
		}
	}

	/**
	 * @param TValue $value
	 * @param string $callee
	 * @param int $parameterPosition
	 * @throws InvalidArgumentException
	 */
	public static function assertBoolean($value, string $callee, int $parameterPosition): void
	{
		if (!is_bool($value)) {
			throw new InvalidArgumentException(
				sprintf(
					'%s() expects parameter %d to be boolean, %s given',
					$callee,
					$parameterPosition,
					self::getType($value)
				)
			);
		}
	}

	/**
	 * @param TValue $value
	 * @param string $callee
	 * @param int $parameterPosition
	 * @throws InvalidArgumentException
	 */
	public static function assertInteger($value, string $callee, int $parameterPosition): void
	{
		if (!is_int($value)) {
			throw new InvalidArgumentException(
				sprintf(
					'%s() expects parameter %d to be integer, %s given',
					$callee,
					$parameterPosition,
					self::getType($value)
				)
			);
		}
	}

	/**
	 * @param TValue $value
	 * @param int $limit
	 * @param string $callee
	 * @param int $parameterPosition
	 * @throws InvalidArgumentException
	 */
	public static function assertIntegerGreaterThanOrEqual($value, int $limit, string $callee, int $parameterPosition): void
	{
		if (!is_int($value) || $value < $limit) {
			throw new InvalidArgumentException(
				sprintf(
					'%s() expects parameter %d to be an integer greater than or equal to %d',
					$callee,
					$parameterPosition,
					$limit
				)
			);
		}
	}

	/**
	 * @param TValue $value
	 * @param int $limit
	 * @param string $callee
	 * @param int $parameterPosition
	 * @throws InvalidArgumentException
	 */
	public static function assertIntegerLessThanOrEqual($value, int $limit, string $callee, int $parameterPosition): void
	{
		if (!is_int($value) || $value > $limit) {
			throw new InvalidArgumentException(
				sprintf(
					'%s() expects parameter %d to be an integer less than or equal to %d',
					$callee,
					$parameterPosition,
					$limit
				)
			);
		}
	}

    /**
     * @param array<TKey, TValue> $args
     * @param int $position
     *
     * @return void
     */
	public static function assertResolvablePlaceholder(array $args, int $position): void
	{
		if (count($args) === 0) {
			throw new InvalidArgumentException(
				sprintf('Cannot resolve parameter placeholder at position %d. Parameter stack is empty.', $position)
			);
		}
	}

	/**
	 * @param TValue $collection
	 * @param string $className
	 * @param string $callee
	 * @param int $parameterPosition
	 * @throws InvalidArgumentException
	 */
	private static function assertCollectionAlike($collection, string $className, string $callee, int $parameterPosition): void
	{
		if (!is_array($collection) && !$collection instanceof $className) {
			throw new InvalidArgumentException(
				sprintf(
					'%s() expects parameter %d to be array or instance of %s, %s given',
					$callee,
					$parameterPosition,
					$className,
					self::getType($collection)
				)
			);
		}
	}

    /**
     * @param TValue $value
     * @param string $callee
     *
     * @return void
     */
	public static function assertNonZeroInteger($value, string $callee): void
	{
		if (!is_int($value) || $value == 0) {
			throw new InvalidArgumentException(sprintf('%s expected parameter %d to be non-zero', $callee, $value));
		}
	}

    /**
     * @param TValue $value
     *
     * @return string
     */
	private static function getType($value): string
	{
		return is_object($value) ? get_class($value) : gettype($value);
	}
}
