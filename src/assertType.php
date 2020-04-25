<?php

namespace Slash;

/**
 * @param $value
 * @param $type
 * @param string $funcName
 */
function assertType($value, $type, $funcName = __FUNCTION__)
{
    if (!isType($value, $type)) {
        throw new \InvalidArgumentException(sprintf(
            '%s expects %s but was given %s',
            $funcName,
            \implode(' or ', (array) $type),
            is_object($value) ? get_class($value) : gettype($value)
        ));
    }
}
