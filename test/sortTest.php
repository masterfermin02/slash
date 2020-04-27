<?php

use PHPUnit\Framework\TestCase;
use function Slash\comparator;
use function Slash\getWith;
use function Slash\useWith;

class sortTest extends TestCase {

    protected $evenExperted = [2,4,6,8,10];
    protected $desending;
    protected $ascending;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->desending = Slash\comparator('Slash\greaterThan');
        $this->ascending = Slash\comparator('Slash\lessThan');
    }

    /**
     * @dataProvider cases
     */
    public function testSort($list, $func, $experted)
    {
        $this->assertEquals(array_values($experted), array_values(Slash\sortBy($func)($list)));
    }

    public function cases()
    {
        return [
            'With a empty list' => [
                'list' => [],
                'func' => $this->desending,
                'experted' => [],
            ],
            'With range 1-10 return false for even' => [
                'list' => [1,2,3],
                'func' => $this->desending,
                'experted' => [3,2,1],
            ],
            'With an associative array with several elements that satisfy the predicate' => [
                'list' => ['a' => 1, 'b' => 2, 'c' => 4, 'd' => 7, 'e' => 9],
                'func' => $this->desending,
                'expected' => ['e' => 9, 'd' => 7, 'c' => 4, 'b' => 2, 'a' => 1],
            ]
        ];
    }
}
