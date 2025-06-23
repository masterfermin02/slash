<?php

use PHPUnit\Framework\TestCase;
use Slash\Exceptions\InvalidArgumentException;

class InvalidArgumentExceptionTest extends TestCase
{
    public function testCallbackExceptionWithUndefinedStaticMethod(): void
    {
        $this->expectException(TypeError::class);
        (new InvalidArgumentException)->assertCallback(['stdClass', 'method'], 'func', 1);
    }

    public function testCallbackExceptionWithUndefinedFunction(): void
    {
        $this->expectException(TypeError::class);
        InvalidArgumentException::assertCallback('undefinedFunction', 'func', 1);
    }

    public function testCallbackExceptionWithUndefinedMethod(): void
    {
        $this->expectException(TypeError::class);
        InvalidArgumentException::assertCallback([new \stdClass(), 'method'], 'func', 2);
    }

    public function testCallbackExceptionWithIncorrectArrayIndex(): void
    {
        $this->expectException(TypeError::class);
        InvalidArgumentException::assertCallback([1 => new \stdClass(), 2 => 'method'], 'func', 1);
    }

    public function testCallbackExceptionWithObject(): void
    {
        $this->expectException(TypeError::class);
        InvalidArgumentException::assertCallback(new \stdClass(), 'func', 1);
    }

    public function testExceptionIfStringIsPassedAsList(): void
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage("func() expects parameter 4 to be array or instance of Traversable");

        InvalidArgumentException::assertCollection('string', 'func', 4);
    }

    public function testExceptionIfObjectIsPassedAsList(): void
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage("func() expects parameter 2 to be array or instance of Traversable");

        InvalidArgumentException::assertCollection(new \stdClass(), 'func', 2);
    }

    public function testAssertArrayAccessValidCase(): void
    {
        $validObject = new \ArrayObject();

        InvalidArgumentException::assertArrayAccess($validObject, "func", 4);
        $this->addToAssertionCount(1);
    }

    public function testAssertArrayAccessWithString(): void
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage('func() expects parameter 4 to be array or instance of ArrayAccess');
        InvalidArgumentException::assertArrayAccess('string', "func", 4);
    }

    public function testAssertArrayAccessWithStandardClass(): void
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage('func() expects parameter 2 to be array or instance of ArrayAccess');
        InvalidArgumentException::assertArrayAccess(new \stdClass(), "func", 2);
    }

    public function testExceptionIfInvalidMethodName(): void
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage('foo() expects parameter 2 to be string, stdClass given');
        InvalidArgumentException::assertMethodName(new \stdClass(), 'foo', 2);
    }

    public function testExceptionIfInvalidPropertyName(): void
    {
        InvalidArgumentException::assertPropertyName('property', 'func', 2);
        InvalidArgumentException::assertPropertyName(0, 'func', 2);
        InvalidArgumentException::assertPropertyName(0.2, 'func', 2);
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage('func() expects parameter 2 to be a valid property name or array index, stdClass given');
        InvalidArgumentException::assertPropertyName(new \stdClass(), "func", 2);
    }

    public function testNoExceptionThrownWithPositiveInteger(): void
    {
        $this->assertNull(InvalidArgumentException::assertPositiveInteger('2', 'foo', 1));
        $this->assertNull(InvalidArgumentException::assertPositiveInteger(2, 'foo', 1));
    }

    public function testExceptionIfNegativeIntegerInsteadOfPositiveInteger(): void
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage('func() expects parameter 2 to be positive integer, negative integer given');
        InvalidArgumentException::assertPositiveInteger(-1, 'func', 2);
    }

    public function testExceptionIfStringInsteadOfPositiveInteger(): void
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage('func() expects parameter 2 to be positive integer, string given');
        InvalidArgumentException::assertPositiveInteger('str', 'func', 2);
    }

    public function testExceptionIfValidArrayKey(): void
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage('foo(): callback returned invalid array key of type');
        InvalidArgumentException::assertValidArrayKey(new \stdClass(), 'foo');
    }

    public function testExceptionIfArrayKeyExists(): void
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage('foo(): unknown key "foo"');
        InvalidArgumentException::assertArrayKeyExists([], 'foo', 'foo');
    }

    public function testExceptionIfBoolean(): void
    {
        $this->expectException(TypeError::class);
        InvalidArgumentException::assertBoolean('str', 'foo', 'foo');
    }

    public function testExceptionIfInterger(): void
    {
        $this->expectException(TypeError::class);
        InvalidArgumentException::assertInteger('str', 'foo', 'foo');
    }

    public function testExceptionIfIntegerGreaterThanOrEqual(): void
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage('foo() expects parameter 0 to be an integer greater than or equal to 2');
        InvalidArgumentException::assertIntegerGreaterThanOrEqual(1, 2, 'foo', 0);
    }

    public function testExceptionIfIntegerLessThanOrEqual(): void
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage('foo() expects parameter 0 to be an integer less than or equal to 1');
        InvalidArgumentException::assertIntegerLessThanOrEqual(2, 1, 'foo', 0);
    }

    public function testExceptionIfResolvablePlaceholder(): void
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage('Cannot resolve parameter placeholder at position 1. Parameter stack is empty.');
        InvalidArgumentException::assertResolvablePlaceholder([], 1);
    }

    public function testExceptionIfNonZeroInteger(): void
    {
        $this->expectException('Slash\Exceptions\InvalidArgumentException');
        $this->expectExceptionMessage('foo expected parameter 0 to be non-zero');
        InvalidArgumentException::assertNonZeroInteger(0, 'foo');
    }
}
