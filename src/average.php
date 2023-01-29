<?php

namespace Slash;

if (!function_exists('average')) {
    /**
     *
     * Return the average of an array
     *
     * @template TKey
     * @template TValue
     *
     * @param array<TKey, TValue> $list
     *
     * @return float|int|null
     *
     * @example
     *    Slash\average([1, 3, 5]); // === 3
     */
    function average($list): float|int|null
    {
        $size = count($list);

        if ($size === 0) {
            return null;
        }

        return sum($list)/$size;
    }
}
