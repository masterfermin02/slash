<?php

use PHPUnit\Framework\TestCase;

class ComparatorTest extends TestCase {

    #[\PHPUnit\Framework\Attributes\DataProvider('cases')]
    public function testComparator(array $list, string $func, int $expected): void
    {
        $this->assertEquals($expected, Slash\comparator($func)($list[0],$list[1]));
    }

    public static function cases(): array
    {
        return [
            'With 1 > 0 return -1' => [
                'list' => [1, 0],
                'func' => 'Slash\greaterThan',
                'expected' => -1,
            ],
            'With 0 > 1 return 1' => [
                'list' => [0, 1],
                'func' => 'Slash\greaterThan',
                'expected' => 1,
            ],
            'With 0 = 0 return 0' => [
                'list' => [0, 0],
                'func' => 'Slash\greaterThan',
                'expected' => 0,
            ]
        ];
    }
}
