<?php

namespace Slash;

/**
 * @param $value
 * @param $type
 * @return bool
 */
function isType($value, $type)
{
    if (!$type) {
        return true;
    }

    $types = (array) $type;

    foreach ($types as $type) {
        if ($type === 'iterable' && !function_exists("is_$type")) {
            // Polyfills is_iterable() since it's only in PHP 7.1+
            // @codeCoverageIgnoreStart
            $isType = is_array($value) || $value instanceof \Traversable;
            // @codeCoverageIgnoreEnd
        }
        elseif (function_exists("is_$type")) {
            // is_*() function type
            $isType = call_user_func("is_$type", $value);
        }
        else {
            // Class type
            $isType = ($value instanceof $type);
        }

        if ($isType) {
            return true;
        }
    }

    return false;
}
