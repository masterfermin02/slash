<?php

use \PHPUnit\Framework\TestCase;

class GetTest extends TestCase {

    protected const SAMPLE_VALUE = 'Sample value';

    #[\PHPUnit\Framework\Attributes\DataProvider('cases')]
    public function testGet(\stdClass|\Closure|array|null $input, string $prop, string $expected): void
    {
        $this->assertEquals($expected, Slash\get($input, $prop));
    }

    public static function cases(): array
    {
        return [
            'With a null input' => [
                'input' => null,
                'prop' => 'prop',
                'expected' => 'prop',
            ],
            'With an empty array input' => [
                'input' => [],
                'prop' => 'prop',
                'expected' => 'prop',
            ],
            'With an array without prop requested input' => [
                'input' => ['noprop' => []],
                'prop' => 'prop',
                'expected' => 'prop',
            ],
            'With an array input' => [
                'input' => ['prop' => self::SAMPLE_VALUE],
                'prop' => 'prop',
                'expected' => 'Sample value',
            ],
            'With an empty object input' => [
                'input' => new stdClass,
                'prop' => 'prop',
                'expected' => 'prop',
            ],
            'With an object input' => [
                'input' => self::getObject(),
                'prop' => 'prop',
                'expected' => self::SAMPLE_VALUE,
            ],
            'With function' => [
                'input' => function(): string { return self::SAMPLE_VALUE; },
                'prop' => 'prop',
                'expected' => self::SAMPLE_VALUE,
            ],
        ];
    }

    private static function getObject(): \stdClass
    {
        $object = new stdClass;
        $object->prop = self::SAMPLE_VALUE;
        return $object;

    }
}
