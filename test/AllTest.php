<?php

use PHPUnit\Framework\TestCase;

class allTest extends TestCase {

    #[\PHPUnit\Framework\Attributes\DataProvider('cases')]
    public function testAll(array $list, string $func, bool $expected): void
    {
        $this->assertEquals($expected, Slash\all($list, $func));
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('invalidArgs')]
    public function testInvalidArgumentException(?\stdClass $list, string $func): void
    {
        $this->expectException(TypeError::class);

        Slash\all($list, $func);
    }

    public static function invalidArgs(): array
    {
        return [
            'With null' => [
                'list' => null,
                'func' => 'Slash\isEven',
            ],
            'With an empty stdClass' => [
                'list' => (object) [],
                'func' => 'Slash\isOdd',
            ],
            'With an stdClass with no elements that satisfy the predicate' => [
                'list' => (object) ['a' => 2, 'b' => 4, 'c' => 6],
                'func' => 'Slash\isOdd',
            ],
            'With an stdClass with one element that satisfies the predicate' => [
                'list' => (object) ['a' => 2, 'b' => 3, 'c' => 6],
                'func' => 'Slash\isOdd',
            ],
            'With an stdClass with several elements that satisfy the predicate' => [
                'list' => (object) ['a' => 1, 'b' => 4, 'c' => 5],
                'func' => 'Slash\isOdd',
            ],
            'With an stdClass with all elements that satisfy the predicate' => [
                'list' => (object) ['a' => 1, 'b' => 3, 'c' => 5],
                'func' => 'Slash\isOdd',
            ],
        ];
    }

    public static function cases(): array
    {
        return [
            'With a empty list' => [
                'list' => [],
                'func' => 'Slash\isEven',
                'expected' => true,
            ],
            'With range 1-10 return false for even' => [
                'list' => range(1, 10),
                'func' => 'Slash\isEven',
                'expected' => false,
            ],
            'With 2,4,8 return true for even' => [
                'list' => [2,4,8],
                'func' => 'Slash\isEven',
                'expected' => true,
            ],
            'With 1,3,5 return true for odd' => [
                'list' => [1,3,5],
                'func' => 'Slash\isOdd',
                'expected' => true,
            ],
            'With an associative array with no elements that satisfy the predicate' => [
                'list' => ['a' => 2, 'b' => 4, 'c' => 6, 'd' => 8],
                'func' => 'Slash\isOdd',
                'expected' => false,
            ],
            'With an associative array with one element that satisfies the predicate' => [
                'list' => ['a' => 2, 'b' => 4, 'c' => 5, 'd' => 6],
                'func' => 'Slash\isOdd',
                'expected' => false,
            ],
            'With an associative array with several elements that satisfy the predicate' => [
                'list' => ['a' => 1, 'b' => 3, 'c' => 4, 'd' => 7],
                'func' => 'Slash\isOdd',
                'expected' => false,
            ],
            'With an associative array with all elements that satisfy the predicate' => [
                'list' => ['a' => 1, 'b' => 3, 'c' => 5, 'd' => 7],
                'func' => 'Slash\isOdd',
                'expected' => true,
            ],
        ];
    }
}
