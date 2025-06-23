<?php

use PHPUnit\Framework\TestCase;

class LessThanTest extends TestCase {

    #[\PHPUnit\Framework\Attributes\DataProvider('cases')]
    public function testComparator(array $list, bool $expected): void
    {
        $this->assertEquals($expected, Slash\lessThan($list[0],$list[1]));
    }

    public static function cases(): array
    {
        return [
            'With 1 < 0 return false' => [
                'list' => [1, 0],
                'expected' => false,
            ],
            'With 0 > 1 return false' => [
                'list' => [0, 1],
                'expected' => true,
            ],
            'With 0 = 0 return true' => [
                'list' => [0, 0],
                'expected' => false,
            ]
        ];
    }
}
