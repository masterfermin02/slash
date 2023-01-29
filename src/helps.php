<?php

use Slash\Collection;

if (!function_exists('collect'))
{
    /**
     * @template TKey of array-key
     * @template TValue
     * @param array<TKey, TValue> $items
     *
     * @return mixed
     */
    function collect(array $items)
    {
        return Collection::make($items);
    }
}
