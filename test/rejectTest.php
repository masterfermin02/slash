<?php

use PHPUnit\Framework\TestCase;

class rejectTest extends TestCase {

    /**
     * @dataProvider cases
     */
    public function testFilter($list, $func, $expected)
    {
        $this->assertEquals(array_values($expected), array_values(Slash\reject($list, $func)));
    }

    /**
     * @dataProvider cases
     */
    public function testFilterWith($list, $func, $expected)
    {
        $this->assertEquals(array_values($expected), array_values(Slash\rejectWith($func)($list)));
    }

    public function cases()
    {
        return [
            'With a empty list' => [
                'list' => [],
                'func' => 'Slash\isEven',
                'experted' => [],
            ],
            'With range 1-10 return false for even' => [
                'list' => [1,2,3,4],
                'func' => 'Slash\isEven',
                'experted' => [1,3],
            ],
            'With an associative array with several elements that satisfy the predicate' => [
                'list' => ['a' => 1, 'b' => 2, 'c' => 4, 'd' => 7, 'e' => 9],
                'func' => Slash\greaterThanOrEqualTo(3),
                'expected' => ['a' => 1, 'b' => 2],
            ],
            'With an associative array with all elements that satisfy the predicate' => [
                'list' => ['a' => 1, 'b' => 3, 'c' => 5, 'd' => 7, 'e' => 8],
                'func' => 'Slash\isOdd',
                'expected' => ['e' => 8],
            ],
            'With an empty stdClass' => [
                'list' =>  [],
                'func' => 'Slash\isOdd',
                'expected' => [],
            ],
            'With an stdClass with no elements that satisfy the predicate' => [
                'list' =>  ['a' => 2, 'b' => 4, 'c' => 6],
                'func' => 'Slash\isOdd',
                'expected' => ['a' => 2, 'b' => 4, 'c' => 6],
            ],
            'With an stdClass with one element that satisfies the predicate' => [
                'list' => ['a' => 2, 'b' => 3, 'c' => 6],
                'func' => 'Slash\isOdd',
                'expected' => ['a' => 2, 'c' => 6],
            ],
            'With an stdClass with several elements that satisfy the predicate' => [
                'list' =>  ['a' => 1, 'b' => 4, 'c' => 5],
                'func' => 'Slash\isOdd',
                'expected' => ['b' => 4],
            ],
            'With an stdClass with all elements that satisfy the predicate' => [
                'list' =>  ['a' => 1, 'b' => 3, 'c' => 5],
                'func' => 'Slash\isOdd',
                'expected' => [],
            ],
        ];
    }
}
