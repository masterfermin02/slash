<?php

use JetBrains\PhpStorm\ArrayShape;
use PHPUnit\Framework\TestCase;
use Slash\Collections;

require_once dirname(__DIR__) . '/test/Fixtures/GroupByFixture.php';

class CollectionsTest extends TestCase {

    /**
     * The instance of Arrays.
     */
    protected Collections $collections;

    public function setUp(): void
    {
        parent::setUp();

        $this->collections = New Collections();
    }


    #[\PHPUnit\Framework\Attributes\DataProvider('cases')]
    public function testFunctionMethods(array $list, \Closure|string|int $func, string $method, bool|int|array $expected): void
    {
        $this->assertEquals($expected, call_user_func([$this->collections, $method], $list, $func));
    }


    #[\PHPUnit\Framework\Attributes\DataProvider('valueCases')]
    public function testArrayMethods(array $list, string $method, int|array $expected): void
    {
        $this->assertEquals($expected, call_user_func([$this->collections, $method], $list));
    }

    public function testSizeTypeErrorException(): void
    {
        $this->expectException(TypeError::class);
        call_user_func([$this->collections, 'size'], null);
    }

    public function testShuffle(): void
    {
        $this->assertCount(2, call_user_func([$this->collections, 'shuffle'], [1,2]));
    }

    public function testPluck(): void
    {
        $this->assertEquals([1,2], call_user_func([$this->collections, 'pluck'], [
            ['id' => 1],
            ['id' => 2]
        ],
        'id'
        ));
    }

    public function testSortBy(): void
    {
        $param = [1,4,2,3];
        $expected = [4,3,2,1];
        $asc = function ($a, $b): int { return $a < $b ? 1 : 0; };

        $this->assertEquals($expected, call_user_func([$this->collections, 'sortBy'], $param, $asc));
    }

    #[ArrayShape(['With array test map'                                            => "array",
                  'With 2,4,8 return true for even'                                => "array",
                  'With 2,4,8 return true for even all'                            => "array",
                  'With 2,4,8 return [4,8] for reject 2'                           => "array",
                  'With ["a" => 2, "b" => 4, "c" => 8] pluck 0 should returns [2]' => "array",
                  'With 2,4,8 return true for even contains'                       => "array",
                  'With array test invoke'                                         => "array",
                  'With array test reduce'                                         => "array",
                  'With array test sortBy'                                         => "array"
    ])] public static function cases(): array
    {
        return [
            'With array test map' => [
                'list' => [1,2,3,4,5,6,7,8,9,10],
                'func' => function ($n): int|float { return $n * 2; },
                'method' => 'map',
                'expected' => [2, 4, 6, 8, 10, 12, 14, 16, 18, 20],
            ],
            'With 2,4,8 return true for even' => [
                'list' => [2,4,8],
                'func' => function($number): bool { return Slash\isEven($number); },
                'method' => 'any',
                'expected' => true,
            ],
            'With 2,4,8 return true for even all' => [
                'list' => [2,4,8],
                'func' => function($number): bool { return Slash\isEven($number); },
                'method' => 'all',
                'expected' => true,
            ],
            'With 2,4,8 return [4,8] for reject 2' => [
                'list' => [2,4,8],
                'func' => function($number): bool { return Slash\equal($number, 2); },
                'method' => 'reject',
                'expected' => [4,8],
            ],
            'With ["a" => 2, "b" => 4, "c" => 8] pluck 0 should returns [2]' => [
                'list' => [["a" => 2], "b" => 4, "c" => 8],
                'func' => "a",
                'method' => 'pluck',
                'expected' => [2],
            ],
            'With 2,4,8 return true for even contains' => [
                'list' => [2,4,8],
                'func' => 2,
                'method' => 'contains',
                'expected' => true,
            ],
            'With array test invoke' => [
                'list' => [1,2,3,4,5,6,7,8,9,10],
                'func' => function ($n): int|float { return $n * 2; },
                'method' => 'invoke',
                'expected' => [2, 4, 6, 8, 10, 12, 14, 16, 18, 20],
            ],
            'With array test reduce' => [
                'list' => [1,2,3],
                'func' => function ($total, $n): float|int|array { return $total + $n; },
                'method' => 'reduce',
                'expected' => 6,
            ],
            'With array test sortBy' => [
                'list' => [1,4,2,3],
                'func' => function ($a, $b): int { return $a < $b ? 1 : 0; },
                'method' => 'sortBy',
                'expected' => [4,3,2,1],
            ],
        ];
    }

    #[ArrayShape(['With array [1, 2] size method should return 2'                             => "array",
                  'With array shuffle method should returns array'                            => "array",
                  'With array [1, 2] min method should return 1'                              => "array",
                  'With array [1000, 2, 50, 1, 30, 40, 500] min method should return 1'       => "array",
                  'With array [1, 2] max method should return 2'                              => "array",
                  'With array [1000, 2, 50, 1, 5000, 30, 40, 500] min method should return 1' => "array"
    ])]
    public static function valueCases(): array
    {
        return [
            'With array [1, 2] size method should return 2' => [
                'list' => [1,2],
                'method' => 'size',
                'expected' => 2,
            ],
            'With array shuffle method should returns array' => [
                'list' => [1],
                'method' => 'shuffle',
                'expected' => [1],
            ],
            'With array [1, 2] min method should return 1' => [
                'list' => [1,2],
                'method' => 'min',
                'expected' => 1,
            ],
            'With array [1000, 2, 50, 1, 30, 40, 500] min method should return 1' => [
                'list' => [1000, 2, 50, 1, 30, 40, 500],
                'method' => 'min',
                'expected' => 1,
            ],
            'With array [1, 2] max method should return 2' => [
                'list' => [1,2],
                'method' => 'max',
                'expected' => 2,
            ],
            'With array [1000, 2, 50, 1, 5000, 30, 40, 500] min method should return 1' => [
                'list' => [1000, 2, 50, 1, 5000, 30, 40, 500],
                'method' => 'max',
                'expected' => 5000,
            ],
        ];
    }

    public function testToArray(): void
    {
        $data = 'Hello';
        $expected = [$data];
        $this->assertEquals($expected, $this->collections->toArray($data));
    }

    public function testEach(): void
    {
        $expected = [2,3,4,5,6,7,8,9,10,11];
        $data = [1,2,3,4,5,6,7,8,9,10];
        $this->collections->each($data, function (&$n): void {
            $n++;
        });

        $this->assertEquals($expected[3], $data[3] + 1);
    }

    public function testGroupByID(): void
    {
        $grouped = $this->collections->groupBy([
            ['id' => 1, 'value1' => 5, 'value2' => 10],
            ['id' => 2, 'value1' => 50, 'value2' => 100],
            ['id' => 1, 'value1' => 2, 'value2' => 2],
            ['id' => 2, 'value1' => 15, 'value2' => 20],
            ['id' => 3, 'value1' => 15, 'value2' => 20],
        ], 'id');

        $this->assertEquals(\test\Fixtures\GroupByFixture::EXPERT_GROUP_BY[3], $grouped[3]);
    }
}
