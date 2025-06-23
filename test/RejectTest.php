<?php

use PHPUnit\Framework\TestCase;

class RejectTest extends TestCase {

    #[\PHPUnit\Framework\Attributes\DataProvider('cases')]
    public function testFilter(array $list, string|callable $func, array $expected): void
    {
        $this->assertEquals(array_values($expected), array_values(Slash\reject($list, $func)));
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('cases')]
    public function testFilterWith(array $list, string|callable $func, array $expected): void
    {
        $this->assertEquals(array_values($expected), array_values(Slash\rejectWith($func)($list)));
    }

    public static function cases(): array
    {
        return [
            'With a empty list' => [
                'list' => [],
                'func' => 'Slash\isEven',
                'expected' => [],
            ],
            'With range 1-10 return false for even' => [
                'list' => [1,2,3,4],
                'func' => 'Slash\isEven',
                'expected' => [1,3],
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
