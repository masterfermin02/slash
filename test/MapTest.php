<?php

use PHPUnit\Framework\TestCase;

class MapTest extends TestCase {

    #[\PHPUnit\Framework\Attributes\DataProvider('cases')]
    public function testMap(array $list, \Closure $func, array $expected): void
    {
        $this->assertEquals(array_values($expected), array_values(Slash\map($list, $func)));
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('cases')]
    public function testMapFunction(array $list, \Closure $func, array $expected): void
    {
        $this->assertEquals(array_values($expected), array_values(slash()->map($list, $func)));
    }

    public static function cases(): array
    {
        return [
            'With a empty list' => [
                'list' => [],
                'func' => function (): void {},
                'expected' => [],
            ],
            'With range 1-10 return false for even' => [
                'list' => [1,2,3,4,5,6,7,8,9,10],
                'func' => function ($n): int|float { return $n * 2; },
                'expected' => [2, 4, 6, 8, 10, 12, 14, 16, 18, 20],
            ],
            'With an stdClass with several elements ' => [
                'list' => ['a' => 1, 'b' => 4, 'c' => 5],
                'func' => function ($n): int|float { return $n * 2; },
                'expected' => ['a' => 2, 'b' => 8, 'c' => 10],
            ],
        ];
    }
}
