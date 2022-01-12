<?php

namespace Slash;

use Closure;

class Functions
{

	/**
	 * The cached closures.
	 *
	 * @var array
	 */
	protected array $cached = [];

	/**
	 * The called closures.
	 *
	 * @var array
	 */
	protected array $called = [];

	/**
	 * The delayed closures.
	 *
	 * @var array
	 */
	protected array $delayed = [];

	/**
	 * Execute $closure and cache its output.
	 *
	 * @param Closure $closure
	 * @return mixed
	 */
	public function cache(Closure $closure): mixed
	{
		$hash = spl_object_hash((object) $closure);

		if (! isset($this->cached[$hash])) {
			$this->cached[$hash] = $closure();
		}

		return $this->cached[$hash];
	}

	/**
	 * Wrap $closure inside $wrapper.
	 *
	 * @param Closure $closure
	 * @param Closure $wrapper
	 * @return mixed
	 */
	public function wrap(Closure $closure, Closure $wrapper): mixed
	{
		return $wrapper($closure);
	}

	/**
	 * Compose $closures.
	 *
	 * @param array $closures
	 * @param array $arguments
	 * @return mixed
	 */
	public function compose(array $closures, array $arguments = []): mixed
	{
		return call_user_func_array(
            call_user_func_array(
                curryRight('Slash\compose'),
                $closures
            ),
            $arguments
        );
	}

	/**
	 * Execute $closure only once and ignore future calls.
	 *
	 * @param Closure $closure
	 * @return void
	 */
	public function once(Closure $closure): void
	{
		$hash = spl_object_hash((object) $closure);

		if (! isset($this->called[$hash])) {
			$closure();

			$this->called[$hash] = true;
		}
	}

	/**
	 * Only execute $closure after the exact $number of failed tries.
	 *
	 * @param integer $number
	 * @param Closure $closure
	 * @return mixed
	 */
	public function after(int $number, Closure $closure): mixed
	{
		$hash = spl_object_hash((object) $closure);

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
