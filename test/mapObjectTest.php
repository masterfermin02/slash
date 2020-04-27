<?php

use PHPUnit\Framework\TestCase;
use function Slash\mapObject;

class mapObjectTest extends TestCase {

    protected $evenExperted = [2,4,6,8,10];

    /**
     * @dataProvider cases
     */
    public function testMapObject($list, $func, $experted)
    {
        $this->assertEquals(array_values($experted), array_values(Slash\mapObject($list, $func)));
    }

    /**
     * @dataProvider cases
     */
    public function testMapObjectWith($list, $func, $experted)
    {
        $this->assertEquals(array_values($experted), array_values(Slash\mapObjectWith($func)($list)));
    }

    public function cases()
    {
        return [
            'With null' => [
                'list' => null,
                'func' => function () {},
                'experted' => [],
            ],
            'With a empty list' => [
                'list' => [],
                'func' => function () {},
                'experted' => [],
            ],
            'With range 1-10 return false for even' => [
                'list' => new ArrayObject([1,2,3,4,5,6,7,8,9,10]),
                'func' => function ($n) { return $n * 2; },
                'experted' => [2, 4, 6, 8, 10, 12, 14, 16, 18, 20],
            ],
            'With an stdClass with several elements ' => [
                'list' => new ArrayObject(['a' => 1, 'b' => 4, 'c' => 5]),
                'func' => function ($n) { return $n * 2; },
                'expected' => ['a' => 2, 'b' => 8, 'c' => 10],
            ],
        ];
    }
}
