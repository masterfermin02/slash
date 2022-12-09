<?php

use PHPUnit\Framework\TestCase;

class equalTest extends TestCase {

    /**
     * @dataProvider cases
     */
    public function testComparator($list, $expected)
    {
        $this->assertEquals($expected, Slash\equal($list[0],$list[1]));
    }

    public function cases()
    {
        return [
            'With 1 = 0 return false' => [
                'list' => [1, 0],
                'expected' => false,
            ],
            'With 0 = 1 return false' => [
                'list' => [0, 1],
                'expected' => false,
            ],
            'With 0 = 0 return true' => [
                'list' => [0, 0],
                'expected' => true,
            ]
        ];
    }
}
