<?php

namespace Slash;

use ArrayAccess;
use Traversable;

/**
 * @template TKey of array-key
 * @template TValue
 *
 * @implements ArrayAccess<TKey, TValue>
 * @implements Enumerable<TKey, TValue>
 */
final class Collection implements ArrayAccess, Enumerable
{
    /**
     * @param array<TKey, TValue> $items
     */
    public  function __construct(
        protected array $items = []
    ) {

    }

    /**
     * @param array<TKey, TValue> $items
     *
     * @return Collection<TKey, TValue>
     */
    public static function make(array $items): self
    {
       return new static($items);
    }

    /**
     * Check if given offset exists.
     *
     * @param  TKey|null  $key
     * @return bool
     */
    public function offsetExists($key): bool
    {
        return isset($this->items[$key]);
    }

    /**
     * Get the item at a given offset.
     *
     * @param  TKey|null  $offset
     * @return TValue
     */
    public function offsetGet($offset): mixed
    {
        return $this->items[$offset];
    }

    /**
     * Set the item at a given offset.
     *
     * @param  TKey|null  $key
     * @param  TValue  $value
     * @return void
     */
    public function offsetSet($key, $value): void
    {
        if (is_null($key)) {
            $this->items[] = $value;
        } else {
            $this->items[$key] = $value;
        }
    }

    /**
     * Remove the item at a given offset.
     *
     * @param TKey $offset
     *
     * @return void
     */
    public function offsetUnset(mixed $offset): void
    {
        unset($this->items[$offset]);
    }

    public function getIterator(): Traversable
    {
        return new \ArrayIterator($this->items);
    }

    public function count(): int
    {
        return count($this->items);
    }

    /**
     * @return false|string
     */
    public function jsonSerialize(): false|string
    {
        return json_encode($this->items);
    }

    /**
     * @inheritDoc
     */
    public function all(): array
    {
        return $this->items;
    }

    public function toArray(): array
    {
        return $this->all();
    }

    /**
     * @param callable $fn
     *
     * @return $this
     */
    public function map(callable $fn): self
    {
        $items = [];

        foreach ($this->items as $key => $value) {
            $items[] = $fn($value, $key);
        }

        return new static($items);
    }

    /**
     * @param callable $fn
     *
     * @return $this
     */
    public function filter(callable $fn): self
    {
        return new static(filter($this->items, $fn));
    }

    public function hasAny(callable $fn): bool
    {
        return any($this->items, $fn);
    }

    public function each(callable $fn): Enumerable
    {
        walk($this->items, $fn);

        return new static($this->items);
    }

    /**
     * @param callable $fn
     *
     * @return $this
     */
    public function reduce(callable $fn): self
    {
        return new static(reduce($this->items, $fn));
    }

    public function filterWith(callable $fn): Enumerable
    {
        return new static(filterWith($fn)($this->items));
    }

    public function groupBy(callable $fn): Enumerable
    {
        return new static(groupBy($fn)($this->items));
    }

    public function unique(callable $fn): Enumerable
    {
        return new static(unique($this->items, $fn));
    }
}
