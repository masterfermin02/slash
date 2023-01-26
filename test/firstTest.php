<?php

use PHPUnit\Framework\TestCase;

class firstTest extends TestCase {

    /**
     * @dataProvider cases
     */
    public function testAll($list, $func, $expected)
    {
        $this->assertEquals($expected, Slash\first($list, $func));
    }

    public function cases()
    {
        return [
            'With a empty list' => [
                'list' => [],
                'func' => 'Slash\isEven',
                'experted' => null,
            ],
            'With range 1-10 return false for even' => [
                'list' => [1,2,3,4,5,6,7,8,9,10],
                'func' => 'Slash\isEven',
                'experted' => 2,
            ],
            'With an associative array with several elements that satisfy the predicate' => [
                'list' => ['a' => 1, 'b' => 2, 'c' => 4, 'd' => 7, 'e' => 9],
                'func' => 'Slash\isEven',
                'expected' => 2,
            ],
            'With an associative array with all elements that satisfy the predicate' => [
                'list' => ['a' => 1, 'b' => 3, 'c' => 5, 'd' => 7, 'e' => 8],
                'func' => 'Slash\isOdd',
                'expected' => 1,
            ],
        ];
    }
}
