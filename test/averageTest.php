<?php

use PHPUnit\Framework\TestCase;
use function Slash\average;

class averageTest extends TestCase {

    /**
     * @dataProvider cases
     */
    public function testAverage($list, $experted)
    {
        $this->assertEquals($experted, average($list));
    }

    /**
     * @dataProvider cases
     */
    public function testAverageWith($list, $experted)
    {
        $this->assertEquals($experted, Slash\averageWith(function ($list) { return $list; })($list));
    }

    public function cases()
    {
        return [
            'With empty input' => [
                'list' => [],
                'experted' => null,
            ],
            'With avarage' => [
                'list' => [1, 0],
                'experted' => 0.50,
            ],
        ];
    }
}
