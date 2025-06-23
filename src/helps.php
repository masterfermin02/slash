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

if (!function_exists('slash'))
{
    /**
     * @template TKey of array-key
     * @template TValue
     * @param array<TKey, TValue> $items
     */
    function slash(): \Slash\Slash
    {
        return \Slash\Slash::make();
    }
}
