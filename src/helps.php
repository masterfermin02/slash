<?php

use Slash\Collection;

if (!function_exists('collect'))
{
    /**
     * @template TKey of array-key
     * @template TValue
     * @param array<TKey, TValue> $items
     */
    function collect(array $items): \Slash\Collection
    {
        return Collection::make($items);
    }
}
