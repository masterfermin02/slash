<?php

use \PHPUnit\Framework\TestCase;

class getTest extends TestCase {

    protected const SAMPLE_VALUE = 'Sample value';

    /**
     * @dataProvider cases
     */
    public function testGet($input, $prop, $expected)
    {
        $this->assertEquals($expected, Slash\get($input, $prop));
    }

    public function cases()
    {
        return [
            'With a null input' => [
                'input' => null,
                'prop' => 'prop',
                'experted' => 'prop',
            ],
            'With an empty array input' => [
                'input' => [],
                'prop' => 'prop',
                'experted' => 'prop',
            ],
            'With an array without prop requested input' => [
                'input' => ['noprop' => []],
                'prop' => 'prop',
                'experted' => 'prop',
            ],
            'With an array input' => [
                'input' => ['prop' => self::SAMPLE_VALUE],
                'prop' => 'prop',
                'experted' => 'Sample value',
            ],
            'With an empty object input' => [
                'input' => new stdClass,
                'prop' => 'prop',
                'experted' => 'prop',
            ],
            'With an object input' => [
                'input' => $this->getObject(),
                'prop' => 'prop',
                'experted' => self::SAMPLE_VALUE,
            ],
            'With function' => [
                'input' => function() { return self::SAMPLE_VALUE; },
                'prop' => 'prop',
                'experted' => self::SAMPLE_VALUE,
            ],
        ];
    }

    private function getObject()
    {
        $object = new stdClass;
        $object->prop = self::SAMPLE_VALUE;
        return $object;

    }
}
