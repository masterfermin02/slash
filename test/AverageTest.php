<?php

use PHPUnit\Framework\TestCase;
use function Slash\average;

class AverageTest extends TestCase {

    #[\PHPUnit\Framework\Attributes\DataProvider('cases')]
    public function testAverage(array $list, ?float $expected): void
    {
        $this->assertEquals($expected, average($list));
    }

    public static function cases(): array
    {
        return [
            'With empty input' => [
                'list' => [],
                'expected' => null,
            ],
            'With avarage' => [
                'list' => [1, 0],
                'expected' => 0.50,
            ],
        ];
    }
}
