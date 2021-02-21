<?php

namespace Slash;

use Slash\Exceptions\InvalidArgumentException;
use Traversable;

/**
 * Returns an array of unique elements
 *
 * @param Traversable|array $collection
 * @param callable $callback
 * @param bool $strict
 * @return array
 * 
 * @example
 *  Slash\unique([1, 3, 5,1,4,6,2,7]); // === [1,2,3,4,5,6,7]
 */
function unique($collection, callable $callback = null, $strict = true)
{
    InvalidArgumentException::assertCollection($collection, __FUNCTION__, 1);

    $indexes = [];
    $aggregation = [];
    foreach ($collection as $key => $element) {
        if ($callback) {
            $index = $callback($element, $key, $collection);
        } else {
            $index = $element;
        }

        if (!in_array($index, $indexes, $strict)) {
            $aggregation[$key] = $element;

            $indexes[] = $index;
        }
    }

    return $aggregation;
}
