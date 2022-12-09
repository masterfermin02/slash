<?php

use PHPUnit\Framework\TestCase;

class flattenTest extends TestCase {

    /**
     * @dataProvider cases
     */
    public function testFlatMap($list, $expected)
    {
        $this->assertEquals($expected, Slash\flatten($list));
    }

    public function cases()
    {
        return [
            'With a empty list' => [
                'list' => [],
                'experted' => [],
            ],
            'With [[1,2],[3,4]]' => [
                'list' => [[1,2],[3,4]],
                'experted' => [1,2,3,4]
            ],
        ];
    }
}
