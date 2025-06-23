<?php

use PHPUnit\Framework\TestCase;
use function Slash\comparator;
use function Slash\getWith;
use function Slash\useWith;

class SortTest extends TestCase
{

    #[\PHPUnit\Framework\Attributes\DataProvider('cases')]
    public function testSort(array $list, callable $func, array $expected): void
    {
        $this->assertEquals(array_values($expected), array_values(Slash\sortBy($func)($list)));
    }

    public static function cases(): array
    {
        $descending = Slash\comparator('Slash\greaterThan');

        return [
            'With a empty list' => [
                'list' => [],
                'func' => $descending,
                'expected' => [],
            ],
            'With range 1-10 return false for even' => [
                'list' => [1,2,3],
                'func' => $descending,
                'expected' => [3,2,1],
            ],
            'With an associative array with several elements that satisfy the predicate' => [
                'list' => ['a' => 1, 'b' => 2, 'c' => 4, 'd' => 7, 'e' => 9],
                'func' => $descending,
                'expected' => ['e' => 9, 'd' => 7, 'c' => 4, 'b' => 2, 'a' => 1],
            ]
        ];
    }
}
