<?php

use PHPUnit\Framework\TestCase;
use Slash\Arrays;

class ArraysTest extends TestCase {

    /**
     * The instance of Arrays.
     *
     * @var Arrays
     */
    protected $arrays;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->arrays = new Arrays();
    }

    function testReturnsTheFirstNElements(): void
    {
        $elements = [2, 3, 4, 5, 6, 7];

        $this->assertEquals($this->arrays->first($elements), [2]);
        $this->assertEquals($this->arrays->first($elements, 3), [2, 3, 4]);
    }

    function testExcludesTheLastNElements(): void
    {
        $elements = [2, 3, 4, 5, 6, 7];

        $this->assertEquals([2, 3, 4, 5, 6], $this->arrays->initial($elements));
        $this->assertEquals([2, 3, 4], $this->arrays->initial($elements, 3));
    }

    function testReturnsTheRestOfTheArrayElements(): void
    {
        $elements = [2, 3, 4, 5, 6, 7];

        $this->assertEquals([3, 4, 5, 6, 7], $this->arrays->rest($elements));
        $this->assertEquals([4, 5, 6, 7], $this->arrays->rest($elements, 2));
    }

    function testReturnsTheLastNElements(): void
    {
        $elements = [2, 3, 4, 5, 6, 7];

        $this->assertEquals([7], $this->arrays->last($elements));
        $this->assertEquals([5, 6, 7], $this->arrays->last($elements, 3));
    }

    function testRemovesFalsyValues(): void
    {
        $elements = [false, 'foo', 0, '', 42];

        $this->assertEquals(['foo', 42], $this->arrays->pack($elements));
    }

    function testFlattensAnArray(): void
    {
        $elements = ['such', ['wow', ['amaze']]];

        $this->assertEquals(['such', 'wow', 'amaze'], $this->arrays->flatten($elements));
    }

    function testCreatesAnArrayContainingARangeOfElements(): void
    {
        $this->assertEquals([0, 1, 2, 3], $this->arrays->range(3));
        $this->assertEquals([1, 2, 3], $this->arrays->range(3, 1));
        $this->assertEquals([1, 3, 5], $this->arrays->range(5, 1, 2));
    }

    function testComputesTheDifferenceBetweenTwoArrays(): void
    {
        $one = [1, 2, 3, 4, 5];

        $another = [1, 3, 5];
        $this->assertEquals([2, 4], $this->arrays->difference($one, $another));
    }

    function testRemovesDuplicatedValues(): void
    {
        $elements = [1, 2, 3, 3, 4, 5, 5, 6, 1];

        $this->assertEquals([1, 2, 3, 4, 5, 6], $this->arrays->unique($elements));

        $iterator = function($value): bool
        {
            return in_array($value, [1, 3, 5], true);
        };

        $this->assertEquals([1, 3, 3, 5, 5, 1], $this->arrays->unique($elements, $iterator));
    }

    function testRemovesAllInstancesFromTheArray(): void
    {
        $elements = ['foo', 'baz', 'bar', 'wow', 'doge', 1];

        $ignore = ['baz', 'wow', '1'];

        $this->assertEquals(['foo', 'bar', 'doge', 1], $this->arrays->without($elements, $ignore));
    }

    function testMergesTwoArrays(): void
    {
        $one = [2, 3, 4, 5, 6];

        $another = [1, 7, 8, 9];

        $this->assertEquals([2, 3, 4, 5, 6, 1, 7, 8, 9], $this->arrays->zip($one, $another));
    }

    function testReturnsTheIndexOfTheFirstMatch(): void
    {
        $elements = [4, 7, 8, 9, 11, 18];

        $element = 9;

        $this->assertEquals(3, $this->arrays->indexof($elements, $element));
    }

    function testComputesTheIntersectionOfTwoArrays(): void
    {
        $one = [2, 3, 4, 5, 6, 7];

        $another = [1, 3, 5, 7, 9];

        $this->assertEquals([3, 5, 7], $this->arrays->intersection($one, $another));
    }

    function testReturnsAnArrayContainingTheUniqueItems(): void
    {
        $one = [1, 2, 3, 4, 5];

        $another = [1, 2, 3, 4, 6];

        $this->assertEquals([1, 2, 3, 4, 5, 6], $this->arrays->union($one, $another));
    }

}
