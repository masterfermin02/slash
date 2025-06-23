<?php

namespace Slash;

use Countable;
use IteratorAggregate;
use JsonSerializable;

/**
 * @template TKey of array-key
 * @template TValue
 *
 * @extends \IteratorAggregate<TKey, TValue>
 */
interface Enumerable extends Countable, IteratorAggregate, JsonSerializable
{
    /**
     * @param array<TKey, TValue> $items
     *
     * @return static
     */
    public static function make(array $items): self;

    /**
     * @return array<TKey, TValue>
     */
    public function all(): array;

    /**
     * @return array<TKey, TValue>
     */
    public function toArray(): array;

    /**
     * @template TItem
     * @param callable(TValue, TKey): TItem $fn
     * @return static
     */
    public function map(callable $fn): self;

    /**
     * @template TItem
     * @param callable(TValue, TKey): TItem $fn
     * @return static
     */
    public function filter(callable $fn): self;

    /**
     * @template TItem
     * @param callable(TValue, TKey): TItem $fn
     */
    public function hasAny(callable $fn): bool;

    /**
     * @template TItem
     * @param callable(TValue, TKey): TItem $fn
     * @return static
     */
    public function each(callable $fn): self;

    /**
     * @template TItem
     * @param callable(TValue, TKey): TItem $fn
     * @return static
     */
    public function reduce(callable $fn): self;

    /**
     * @template TItem
     * @param callable(TValue, TKey): TItem $fn
     * @return static
     */
    public function filterWith(callable $fn): self;

    /**
     * @template TItem
     * @param callable(TValue, TKey): TItem $fn
     * @return static
     */
    public function groupBy(callable $fn): self;

    /**
     * @template TItem
     * @param callable(TValue, TKey): TItem $fn
     * @return static
     */
    public function unique(callable $fn): self;
}
