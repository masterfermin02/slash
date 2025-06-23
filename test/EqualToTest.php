<?php

use PHPUnit\Framework\TestCase;

class EqualToTest extends TestCase {

    #[\PHPUnit\Framework\Attributes\DataProvider('cases')]
    public function testComparator(array $list, bool $expected): void
    {
        $this->assertEquals($expected, Slash\equalTo(0)($list[0]));
    }

    public function testGreaterOrEqual(): void
    {
        $this->assertEquals(true, Slash\greaterThanOrEqualTo(3)(5));
    }

    public static function cases(): array
    {
        return [
            'With 0 = 1 return false' => [
                'list' => [1],
                'expected' => false,
            ],
            'With 0 = 0 return true' => [
                'list' => [0],
                'expected' => true,
            ]
        ];
    }
}
