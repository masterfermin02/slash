<?php

use PHPUnit\Framework\TestCase;

class FlattenTest extends TestCase {

    #[\PHPUnit\Framework\Attributes\DataProvider('cases')]
    public function testFlatMap(array $list, array $expected): void
    {
        $this->assertEquals($expected, Slash\flatten($list));
    }

    public static function cases(): array
    {
        return [
            'With a empty list' => [
                'list' => [],
                'expected' => [],
            ],
            'With [[1,2],[3,4]]' => [
                'list' => [[1,2],[3,4]],
                'expected' => [1,2,3,4]
            ],
        ];
    }
}
