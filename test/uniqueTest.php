<?php

use PHPUnit\Framework\TestCase;
use function Slash\unique;

class uniqueTest extends TestCase {
    /**
     * @dataProvider cases
     */
    public function testFilter($list, $func, $experted)
    {
        $this->assertEquals(array_values($experted), array_values(unique($list, $func)));
    }

    public function testNullCollectionThrowException()
    {
        $this->expectException("Slash\Exceptions\InvalidArgumentException");
        unique(null);
    }

    public function cases()
    {
        return [
            'With a empty list' => [
                'list' => [],
                'func' => 'Slash\isEven',
                'experted' => [],
            ],
            'With range should remove duplicated index' => [
                'list' => [1,1,2,2,3,3,4,4],
                'func' => function ($number) { return $number; },
                'experted' => [1,2,3,4],
            ],
            'With an associative array with several elements that satisfy the predicate' => [
                'list' => ['a' => 1, 't' => 1, 'b' => 2, 'c' => 4, 'd' => 7, 'e' => 9],
                'func' => function($element) { return $element; },
                'expected' => ['a' => 1, 'b' => 2, 'c' => 4, 'd' => 7, 'e' => 9],
            ],
            'With an empty stdClass' => [
                'list' => [],
                'func' => 'Slash\isOdd',
                'expected' => [],
            ],
            'With an stdClass with no elements that satisfy the predicate' => [
                'list' => ['a' => 2, 'd' => 2, 'b' => 4, 'c' => 6],
                'func' => function($element) { return $element; },
                'expected' => ['a' => 2, 'b' => 4, 'c' => 6],
            ],
            'With null callback' => [
                'list' => [1,3,1,3,2,4,5,6,2,1,3,5],
                'func' => null,
                'expected' => [1,3,2,4,5,6],
            ],
        ];
    }
}
