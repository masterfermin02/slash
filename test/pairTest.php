<?php

use PHPUnit\Framework\TestCase;
use function Slash\pair;

class pairTest extends TestCase {

    /**
     * @dataProvider cases
     */
    public function testPair($list, $expected)
    {
        $this->assertEquals($expected, Slash\pair($list[0],$list[1]));
    }

    /**
     * @dataProvider cases
     */
    public function testPairWith($list, $expected)
    {
        $this->assertEquals($expected, Slash\pairWith(function($item){ return $item; })($list[0],$list[1]));
    }

    public function cases()
    {
        return [
            'With [[1,2],[3,4]]' => [
                'list' => [[1,2],[3,4]],
                'experted' => [[1,3],[1,4],[2,3],[2,4]]
            ],
        ];
    }
}
