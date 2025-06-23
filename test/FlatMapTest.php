<?php

use PHPUnit\Framework\TestCase;

use function Slash\greaterThanOrEqual;

class FlatMapTest extends TestCase {

    #[\PHPUnit\Framework\Attributes\DataProvider('cases')]
    public function testFlatMap(array $list, \Closure $func, array $expected): void
    {
        $this->assertEquals($expected, Slash\flatMap($list, $func));
    }

    public static function cases(): array
    {
        return [
            'With a empty list' => [
                'list' => [],
                'func' => function (): void {},
                'expected' => [],
            ],
            'With [[1,2],[3,4]]' => [
                'list' => [[1,2],[3,4]],
                'func' => function ($item): array {
                    return [
                        $item[0] + 2,
                        $item[1] + 2
                    ];
            },
                'expected' => [3,4,5,6]
            ],
            'With [[1,2],[3,4], []]' => [
                'list' => [[1,2],[3,4], []],
                'func' => function ($item): array {
                    return empty($item) ? [] : [
                        $item[0] + 2,
                        $item[1] + 2
                    ];
                },
                'expected' => [3,4,5,6]
            ],
            'With [[1,2,3,4]] greaterThanOrEqual' => [
                'list' => [1,2,3,4],
                'func' => function ($item): array {
                    return greaterThanOrEqual($item, 3) ? [
                        $item
                    ] : [];
                },
                'expected' => [3,4]
            ],
        ];
    }
}
