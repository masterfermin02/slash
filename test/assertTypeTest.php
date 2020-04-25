<?php

use PHPUnit\Framework\TestCase;

/**
 * @covers Slash\assertType
 */
class assertTypeTest extends TestCase
{
    /**
     * @dataProvider cases
     */
    public function test($value, $type)
    {
        Slash\assertType($value, $type);
    }

    /**
     * @dataProvider cases
     */
    public function testCurried($value, $type)
    {
        $assertType = Slash\Curry\assertType($type, __FUNCTION__);
        $assertType($value);
    }

    public function cases()
    {
        return [
            'With a null type' => [
                'value' => 'hello',
                'type' => null,
            ],
            'With an empty string type' => [
                'value' => 'hello',
                'type' => '',
            ],
            'With one type' => [
                'value' => 'hello',
                'type' => 'string',
            ],
            'With several types' => [
                'value' => [1, 2, 3],
                'type' => ['object', 'array'],
            ],
        ];
    }

    /**
     * @dataProvider casesException
     */
    public function testException($value, $type, $expected)
    {
        try {
            Slash\assertType($value, $type);
            $this->assertTrue(false, 'This should never be called');
        }
        catch (InvalidArgumentException $e) {
            $this->assertSame($expected, $e->getMessage());
        }

        try {
            $assertType = Slash\Curry\assertType($type, 'Dash\assertType');
            $assertType($value);
            $this->assertTrue(false, 'This should never be called');
        }
        catch (InvalidArgumentException $e) {
            $this->assertSame($expected, $e->getMessage());
        }
    }

    public function casesException()
    {
        return [
            'With a single type and scalar value' => [
                'value' => 42,
                'type' => 'string',
                'expected' => 'Dash\assertType expects string but was given integer',
            ],
            'With a single type and DateTime value' => [
                'value' => new DateTime(),
                'type' => 'string',
                'expected' => 'Dash\assertType expects string but was given DateTime',
            ],
            'With a single type and stdClass value' => [
                'value' => (object) [],
                'type' => 'string',
                'expected' => 'Dash\assertType expects string but was given stdClass',
            ],
            'With multiple types' => [
                'value' => 3.14,
                'type' => ['null', 'array', 'object'],
                'expected' => 'Dash\assertType expects null or array or object but was given double',
            ],
        ];
    }

    public function testExamples()
    {
        $value = [1, 2, 3];
        Slash\assertType($value, ['iterable', 'stdClass']);
        // Does not throw an exception

        try {
            $value = [1, 2, 3];
            Slash\assertType($value, 'object');
            $this->assertTrue(false, 'This should never be called');
        }
        catch (InvalidArgumentException $e) {
            $this->assertTrue(true);
        }
    }
}
