<?php

use PHPUnit\Framework\TestCase;

class equalToTest extends TestCase {

    /**
     * @dataProvider cases
     */
    public function testComparator($list, $experted)
    {
        $this->assertEquals($experted, Slash\equalTo(0)($list[0]));
    }

    public function testGreaterOrEqual()
    {
        $this->assertEquals(true, Slash\greaterThanOrEqualTo(3)(5));
    }

    public function cases()
    {
        return [
            'With 0 = 1 return false' => [
                'list' => [1],
                'experted' => false,
            ],
            'With 0 = 0 return true' => [
                'list' => [0],
                'experted' => true,
            ]
        ];
    }
}
