<?php

use JetBrains\PhpStorm\ArrayShape;
use PHPUnit\Framework\TestCase;
use Slash\Collections;

require_once dirname(__DIR__) . '/test/Fixtures/GroupByFixture.php';

class CollectionsTest extends TestCase {

    /**
     * The instance of Arrays.
     *
     * @var Collections
     */
    protected Collections $collections;

    public function setUp(): void
    {
        parent::setUp();

        $this->collections = New Collections();
    }

    /**
     * @dataProvider cases
     */
    public function testFunctionMethods($list, $func, $method, $expected)
    {
        $this->assertEquals($expected, call_user_func([$this->collections, $method], $list, $func));
    }

    /**
     * @dataProvider valueCases
     */
    public function testArrayMethods($list, $method, $expected)
    {
        $this->assertEquals($expected, call_user_func([$this->collections, $method], $list));
    }

    public function testSizeTypeErrorException()
    {
        $this->expectException(TypeError::class);
        call_user_func([$this->collections, 'size'], null);
    }

    public function testShuffle()
    {
        $this->assertCount(2, call_user_func([$this->collections, 'shuffle'], [1,2]));
    }

    public function testPluck()
    {
        $this->assertEquals([1,2], call_user_func([$this->collections, 'pluck'], [
            ['id' => 1],
            ['id' => 2]
        ],
        'id'
        ));
    }

    public function testSortBy()
    {
        $param = [1,4,2,3];
        $expected = [4,3,2,1];
        $asc = function ($a, $b) { return $a < $b ? 1 : 0; };

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
    ])] public function cases(): array
    {
        return [
            'With array test map' => [
                'list' => [1,2,3,4,5,6,7,8,9,10],
                'func' => function ($n) { return $n * 2; },
                'method' => 'map',
                'experted' => [2, 4, 6, 8, 10, 12, 14, 16, 18, 20],
            ],
            'With 2,4,8 return true for even' => [
                'list' => [2,4,8],
                'func' => function($number) { return Slash\isEven($number); },
                'method' => 'any',
                'experted' => true,
            ],
            'With 2,4,8 return true for even all' => [
                'list' => [2,4,8],
                'func' => function($number) { return Slash\isEven($number); },
                'method' => 'all',
                'experted' => true,
            ],
            'With 2,4,8 return [4,8] for reject 2' => [
                'list' => [2,4,8],
                'func' => function($number) { return Slash\equal($number, 2); },
                'method' => 'reject',
                'experted' => [4,8],
            ],
            'With ["a" => 2, "b" => 4, "c" => 8] pluck 0 should returns [2]' => [
                'list' => [["a" => 2], "b" => 4, "c" => 8],
                'func' => "a",
                'method' => 'pluck',
                'experted' => [2],
            ],
            'With 2,4,8 return true for even contains' => [
                'list' => [2,4,8],
                'func' => 2,
                'method' => 'contains',
                'experted' => true,
            ],
            'With array test invoke' => [
                'list' => [1,2,3,4,5,6,7,8,9,10],
                'func' => function ($n) { return $n * 2; },
                'method' => 'invoke',
                'experted' => [2, 4, 6, 8, 10, 12, 14, 16, 18, 20],
            ],
            'With array test reduce' => [
                'list' => [1,2,3],
                'func' => function ($total, $n) { return $total + $n; },
                'method' => 'reduce',
                'experted' => 6,
            ],
            'With array test sortBy' => [
                'list' => [1,4,2,3],
                'func' => function ($a, $b) { return $a < $b ? 1 : 0; },
                'method' => 'sortBy',
                'experted' => [4,3,2,1],
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
    public function valueCases(): array
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

    public function testToArray()
    {
        $data = 'Hello';
        $expected = [$data];
        $this->assertEquals($expected, $this->collections->toArray($data));
    }

    public function testEach()
    {
        $expected = [2,3,4,5,6,7,8,9,10,11];
        $data = [1,2,3,4,5,6,7,8,9,10];
        $this->collections->each($data, function (&$n) {
            $n++;
        });

        $this->assertEquals($expected[3], $data[3] + 1);
    }

    public function testGroupByID()
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
