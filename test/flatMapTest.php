<?php

use PHPUnit\Framework\TestCase;

use function Slash\greaterThanOrEqual;

class flatMapTest extends TestCase {

    /**
     * @dataProvider cases
     */
    public function testFlatMap($list, $func, $expected)
    {
        $this->assertEquals($expected, Slash\flatMap($list, $func));
    }

    public function cases()
    {
        return [
            'With a empty list' => [
                'list' => [],
                'func' => function () {},
                'experted' => [],
            ],
            'With [[1,2],[3,4]]' => [
                'list' => [[1,2],[3,4]],
                'func' => function ($item) {
                    return [
                        $item[0] + 2,
                        $item[1] + 2
                    ];
            },
                'experted' => [3,4,5,6]
            ],
            'With [[1,2],[3,4], []]' => [
                'list' => [[1,2],[3,4], []],
                'func' => function ($item) {
                    return !empty($item) ? [
                        $item[0] + 2,
                        $item[1] + 2
                    ] : [];
                },
                'experted' => [3,4,5,6]
            ],
            'With [[1,2,3,4]] greaterThanOrEqual' => [
                'list' => [1,2,3,4],
                'func' => function ($item) {
                    return greaterThanOrEqual($item, 3) ? [
                        $item
                    ] : [];
                },
                'experted' => [3,4]
            ],
        ];
    }
}
