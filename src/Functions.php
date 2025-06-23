<?php

namespace Slash;

use Closure;
use http\Exception\InvalidArgumentException;

/**
 * @template TKey
 * @template TValue
 */
class Functions
{

	/**
	 * The cached closures.
	 *
	 * @var array<string, TValue>
	 */
	protected array $cached = [];

	/**
	 * The called closures.
	 *
	 * @var array<string, bool>
	 */
	protected array $called = [];

	/**
	 * The delayed closures.
	 *
	 * @var array<string, Closure>
	 */
	protected array $delayed = [];

	/**
     * Execute $closure and cache its output.
     *
     * @return string
     */
    public function cache(Closure $closure)
	{
		$hash = spl_object_hash($closure);

		if (!isset($this->cached[$hash])) {
			$this->cached[$hash] = $closure();
		}

		return $this->cached[$hash];
	}

	/**
     * Wrap $closure inside $wrapper.
     *
     * @return TValue
     */
    public function wrap(Closure $closure, Closure $wrapper)
	{
		return $wrapper($closure);
	}

	/**
	 * Compose $closures.
	 *
	 * @param array<TKey, TValue> $closures
	 * @param array<TKey, TValue> $arguments
	 * @return TValue
	 */
	public function compose(array $closures, array $arguments = []): mixed
	{
        $fn = call_user_func_array(
            curryRight('Slash\compose'),
            $closures
        );

        if (!is_callable($fn)) {
            throw new InvalidArgumentException('Function not found');
        }

		return call_user_func_array(
            $fn,
            $arguments
        );
	}

	/**
     * Execute $closure only once and ignore future calls.
     */
    public function once(Closure $closure): void
	{
		$hash = spl_object_hash($closure);

		if (!isset($this->called[$hash])) {
			$closure();

			$this->called[$hash] = true;
		}
	}

	/**
     * Only execute $closure after the exact $number of failed tries.
     *
     * @return TValue|null
     */
    public function after(int $number, Closure $closure)
	{
		$hash = spl_object_hash($closure);

		if (isset($this->delayed[$hash])) {
			$closure = $this->delayed[$hash];

			return $closure();
		}

		$this->delayed[$hash] = function () use ($number, $closure) {
			static $tries = 0;

			$tries += 1;

			if ($tries === $number) {
				return $closure();
			}

			return null;
		};

		return null;
	}
}
