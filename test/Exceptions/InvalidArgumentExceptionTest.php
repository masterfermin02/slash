<?php

use PHPUnit\Framework\TestCase;
use Slash\Exceptions\InvalidArgumentException;

class InvalidArgumentExceptionTest extends TestCase
{
    public function testCallbackExceptionWithUndefinedStaticMethod()
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage("func() expects parameter 1 to be a valid callback, method 'stdClass::method' not found or invalid method name");

        InvalidArgumentException::assertCallback(['stdClass', 'method'], 'func', 1);
    }

    public function testCallbackExceptionWithUndefinedFunction()
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage("func() expects parameter 1 to be a valid callback, function 'undefinedFunction' not found or invalid function name");

        InvalidArgumentException::assertCallback('undefinedFunction', 'func', 1);
    }

    public function testCallbackExceptionWithUndefinedMethod()
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage("func() expects parameter 2 to be a valid callback, method 'stdClass->method' not found or invalid method name");

        InvalidArgumentException::assertCallback([new \stdClass(), 'method'], 'func', 2);
    }

    public function testCallbackExceptionWithIncorrectArrayIndex()
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage("func() expects parameter 1 to be a valid callback, method 'stdClass->method' not found or invalid method name");

        InvalidArgumentException::assertCallback([1 => new \stdClass(), 2 => 'method'], 'func', 1);
    }

    public function testCallbackExceptionWithObject()
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage('func() expected parameter 1 to be a valid callback, no array, string, closure or functor given');

        InvalidArgumentException::assertCallback(new \stdClass(), 'func', 1);
    }

    public function testExceptionIfStringIsPassedAsList()
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage("func() expects parameter 4 to be array or instance of Traversable");

        InvalidArgumentException::assertCollection('string', 'func', 4);
    }

    public function testExceptionIfObjectIsPassedAsList()
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage("func() expects parameter 2 to be array or instance of Traversable");

        InvalidArgumentException::assertCollection(new \stdClass(), 'func', 2);
    }

    public function testAssertArrayAccessValidCase()
    {
        $validObject = new \ArrayObject();

        InvalidArgumentException::assertArrayAccess($validObject, "func", 4);
        $this->addToAssertionCount(1);
    }

    public function testAssertArrayAccessWithString()
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage('func() expects parameter 4 to be array or instance of ArrayAccess');
        InvalidArgumentException::assertArrayAccess('string', "func", 4);
    }

    public function testAssertArrayAccessWithStandardClass()
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage('func() expects parameter 2 to be array or instance of ArrayAccess');
        InvalidArgumentException::assertArrayAccess(new \stdClass(), "func", 2);
    }

    public function testExceptionIfInvalidMethodName()
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage('foo() expects parameter 2 to be string, stdClass given');
        InvalidArgumentException::assertMethodName(new \stdClass(), 'foo', 2);
    }

    public function testExceptionIfInvalidPropertyName()
    {
        InvalidArgumentException::assertPropertyName('property', 'func', 2);
        InvalidArgumentException::assertPropertyName(0, 'func', 2);
        InvalidArgumentException::assertPropertyName(0.2, 'func', 2);
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage('func() expects parameter 2 to be a valid property name or array index, stdClass given');
        InvalidArgumentException::assertPropertyName(new \stdClass(), "func", 2);
    }

    public function testNoExceptionThrownWithPositiveInteger()
    {
        $this->assertNull(InvalidArgumentException::assertPositiveInteger('2', 'foo', 1));
        $this->assertNull(InvalidArgumentException::assertPositiveInteger(2, 'foo', 1));
    }

    public function testExceptionIfNegativeIntegerInsteadOfPositiveInteger()
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage('func() expects parameter 2 to be positive integer, negative integer given');
        InvalidArgumentException::assertPositiveInteger(-1, 'func', 2);
    }

    public function testExceptionIfStringInsteadOfPositiveInteger()
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage('func() expects parameter 2 to be positive integer, string given');
        InvalidArgumentException::assertPositiveInteger('str', 'func', 2);
    }

    public function testExceptionIfValidArrayKey()
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage('foo(): callback returned invalid array key of type');
        InvalidArgumentException::assertValidArrayKey(new \stdClass(), 'foo');
    }

    public function testExceptionIfArrayKeyExists()
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage('foo(): unknown key "foo"');
        InvalidArgumentException::assertArrayKeyExists([], 'foo', 'foo');
    }

    public function testExceptionIfBoolean()
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage('foo() expects parameter 0 to be boolean, string given');
        InvalidArgumentException::assertBoolean('str', 'foo', 'foo');
    }

    public function testExceptionIfInterger()
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage('foo() expects parameter 0 to be integer, string given');
        InvalidArgumentException::assertInteger('str', 'foo', 'foo');
    }

    public function testExceptionIfIntegerGreaterThanOrEqual()
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage('foo() expects parameter 0 to be an integer greater than or equal to 2');
        InvalidArgumentException::assertIntegerGreaterThanOrEqual(1, 2, 'foo', 0);
    }

    public function testExceptionIfIntegerLessThanOrEqual()
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage('foo() expects parameter 0 to be an integer less than or equal to 1');
        InvalidArgumentException::assertIntegerLessThanOrEqual(2, 1, 'foo', 0);
    }

    public function testExceptionIfResolvablePlaceholder()
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage('Cannot resolve parameter placeholder at position 1. Parameter stack is empty.');
        InvalidArgumentException::assertResolvablePlaceholder([], 1);
    }

    public function testExceptionIfNonZeroInteger()
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage('foo expected parameter 0 to be non-zero');
        InvalidArgumentException::assertNonZeroInteger(0, 'foo');
    }
}
