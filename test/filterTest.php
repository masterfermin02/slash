<?php

use PHPUnit\Framework\TestCase;

class filterTest extends TestCase {

    protected $evenExperted = [2,4,6,8,10];
    /**
     * @dataProvider cases
     */
    public function testFilter($list, $func, $expected)
    {
        $this->assertEquals(array_values($expected), array_values(Slash\filter($list, $func)));
    }

    public function cases()
    {
        return [
            'With a empty list' => [
                'list' => [],
                'func' => 'Slash\isEven',
                'experted' => [],
            ],
            'With range 1-10 return false for even' => [
                'list' => [1,2,3,4,5,6,7,8,9,10],
                'func' => 'Slash\isEven',
                'experted' => $this->evenExperted,
            ],
            'With an associative array with several elements that satisfy the predicate' => [
                'list' => ['a' => 1, 'b' => 2, 'c' => 4, 'd' => 7, 'e' => 9],
                'func' => Slash\greaterThanOrEqualTo(3),
                'expected' => ['c' => 4, 'd' => 7, 'e' => 9],
            ],
            'With an associative array with all elements that satisfy the predicate' => [
                'list' => ['a' => 1, 'b' => 3, 'c' => 5, 'd' => 7, 'e' => 8],
                'func' => 'Slash\isOdd',
                'expected' => ['a' => 1, 'b' => 3, 'c' => 5, 'd' => 7],
            ],
        ];
    }
}
