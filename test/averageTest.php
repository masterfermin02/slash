<?php

use PHPUnit\Framework\TestCase;

class averageTest extends TestCase {

    /**
     * @dataProvider cases
     */
    public function testAverage($list, $experted)
    {
        $this->assertEquals($experted, Slash\average($list));
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
