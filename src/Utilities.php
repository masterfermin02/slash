<?php

namespace Slash;

use Closure;

class Utilities
{

	/**
     * Generate a unique identifier.
     *
     * @param string $prefix
     */
    public function id($prefix = ''): string
	{
		return uniqid($prefix, true);
	}

	/**
     * Escape all HTML entities in a string.
     *
     * @param string $string
     */
    public function escape($string): string
	{
		return htmlentities($string, ENT_QUOTES, 'UTF-8', false);
	}

	/**
	 * Return the value passed as the first argument.
	 *
	 * @param mixed $value
	 * @return mixed
	 */
	public function with($value)
	{
		return $value;
	}

	/**
     * Invoke a $closure $number of times.
     *
     * @param integer $number
     */
    public function times($number, Closure $closure): void
	{
		foreach (range(1, $number) as $index) {
			$closure();
		}
	}
}
