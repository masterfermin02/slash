<?php

use PHPUnit\Framework\TestCase;

class comparatorTest extends TestCase {

    /**
     * @dataProvider cases
     */
    public function testComparator($list, $func, $experted)
    {
        $this->assertEquals($experted, Slash\comparator($func)($list[0],$list[1]));
    }

    public function cases()
    {
        return [
            'With 1 > 0 return -1' => [
                'list' => [1, 0],
                'func' => 'Slash\greaterThan',
                'experted' => -1,
            ],
            'With 0 > 1 return 1' => [
                'list' => [0, 1],
                'func' => 'Slash\greaterThan',
                'experted' => 1,
            ],
            'With 0 = 0 return 0' => [
                'list' => [0, 0],
                'func' => 'Slash\greaterThan',
                'experted' => 0,
            ]
        ];
    }
}
