<?php

use PHPUnit\Framework\TestCase;

class filterTest extends TestCase {

    protected $evenExperted = [2,4,6,8,10];
    /**
     * @dataProvider cases
     */
    public function testAll($list, $func, $experted)
    {
        $this->assertEquals(array_values($experted), array_values(Slash\filter($list, $func)));
    }

    public function cases()
    {
        return [
            'With null' => [
                'list' => null,
                'func' => 'Slash\isEven',
                'experted' => [],
            ],
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
                'func' => 'Slash\isEven',
                'expected' => ['b' => 2, 'c' => 4],
            ],
            'With an associative array with all elements that satisfy the predicate' => [
                'list' => ['a' => 1, 'b' => 3, 'c' => 5, 'd' => 7, 'e' => 8],
                'func' => 'Slash\isOdd',
                'expected' => ['a' => 1, 'b' => 3, 'c' => 5, 'd' => 7],
            ],
            'With an empty stdClass' => [
                'list' => (object) [],
                'func' => 'Slash\isOdd',
                'expected' => [],
            ],
            'With an stdClass with no elements that satisfy the predicate' => [
                'list' => (object) ['a' => 2, 'b' => 4, 'c' => 6],
                'func' => 'Slash\isOdd',
                'expected' => [],
            ],
            'With an stdClass with one element that satisfies the predicate' => [
                'list' => (object) ['a' => 2, 'b' => 3, 'c' => 6],
                'func' => 'Slash\isOdd',
                'expected' => ['b' => 3],
            ],
            'With an stdClass with several elements that satisfy the predicate' => [
                'list' => (object) ['a' => 1, 'b' => 4, 'c' => 5],
                'func' => 'Slash\isOdd',
                'expected' => ['a' => 1, 'c' => 5],
            ],
            'With an stdClass with all elements that satisfy the predicate' => [
                'list' => (object) ['a' => 1, 'b' => 3, 'c' => 5],
                'func' => 'Slash\isOdd',
                'expected' => ['a' => 1, 'b' => 3, 'c' => 5],
            ],

            /*
                With ArrayObject
             */

            'With an empty ArrayObject' => [
                'list' => new ArrayObject([]),
                'func' => 'Slash\isOdd',
                'expected' => [],
            ],
            'With an ArrayObject with no elements that satisfy the predicate' => [
                'list' => new ArrayObject(['a' => 2, 'b' => 4, 'c' => 6]),
                'func' => 'Slash\isOdd',
                'expected' => [],
            ],
            'With an ArrayObject with one element that satisfies the predicate' => [
                'list' => new ArrayObject(['a' => 2, 'b' => 3, 'c' => 6]),
                'func' => 'Slash\isOdd',
                'expected' => ['b' => 3],
            ],
            'With an ArrayObject with several elements that satisfy the predicate' => [
                'list' => new ArrayObject(['a' => 1, 'b' => 4, 'c' => 5]),
                'func' => 'Slash\isOdd',
                'expected' => ['a' => 1, 'c' => 5],
            ],
            'With an ArrayObject with all elements that satisfy the predicate' => [
                'list' => new ArrayObject(['a' => 1, 'b' => 3, 'c' => 5]),
                'func' => 'Slash\isOdd',
                'expected' => ['a' => 1, 'b' => 3, 'c' => 5],
            ],

        ];
    }
}
