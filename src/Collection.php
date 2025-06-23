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
        private array $items = []
    ) {

    }

    /**
     * @param array<TKey, TValue> $items
     *
     * @return Collection<TKey, TValue>
     */
    public static function make(array $items): self
    {
       return new self($items);
    }

    /**
     * Check if given offset exists.
     *
     * @param  TKey|null  $key
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
        return $this->items;
    }

    /**
     * @return $this
     */
    public function map(callable $fn): self
    {
        $items = [];

        foreach ($this->items as $key => $value) {
            $items[] = $fn($value, $key);
        }

        return new self($items);
    }

    /**
     * @return $this
     */
    public function filter(callable $fn): self
    {
        return new self(filter($this->items, $fn));
    }

    public function hasAny(callable $fn): bool
    {
        return any($this->items, $fn);
    }

    public function each(callable $fn): Enumerable
    {
        walk($this->items, $fn);

        return new self($this->items);
    }

    /**
     * @return $this
     */
    public function reduce(callable $fn): self
    {
        return new self(reduce($this->items, $fn));
    }

    public function filterWith(callable $fn): Enumerable
    {
        return new self(filterWith($fn)($this->items));
    }

    public function groupBy(callable $fn): Enumerable
    {
        return new self(groupBy($fn)($this->items));
    }

    public function unique(callable $fn): Enumerable
    {
        return new self(unique($this->items, $fn));
    }
}
