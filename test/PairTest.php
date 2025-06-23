<?php

use PHPUnit\Framework\TestCase;
use function Slash\pair;

class PairTest extends TestCase {

    #[\PHPUnit\Framework\Attributes\DataProvider('cases')]
    public function testPair(array $list, array $expected): void
    {
        $this->assertEquals($expected, Slash\pair($list[0],$list[1]));
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('cases')]
    public function testPairWith(array $list, array $expected): void
    {
        $this->assertEquals($expected, Slash\pairWith(function($item){ return $item; })($list[0],$list[1]));
    }

    public static function cases(): array
    {
        return [
            'With [[1,2],[3,4]]' => [
                'list' => [[1,2],[3,4]],
                'expected' => [[1,3],[1,4],[2,3],[2,4]]
            ],
        ];
    }
}
