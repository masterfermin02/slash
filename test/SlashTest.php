<?php

use PHPUnit\Framework\TestCase;
use Slash\Slash;

class SlashTest extends TestCase {

    /**
     * The instance of Slash.
     *
     * @var Slash
     */
    protected Slash $slash;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->slash = new Slash();
    }

    function testReturnsAllModules()
    {
        $this->assertIsArray($this->slash->getModules());
        $this->assertEquals(count($this->slash->getModules()), 5);
    }

    function testLoadsAModule()
    {
        $this->assertInstanceOf('Slash\Collections', $this->slash->load('Slash\Collections'));

        $this->expectException('UnexpectedValueException');
        $this->slash->load('fsdwfwgwa');
        $this->assertInstanceOf('stdClass', $this->slash->load('foo', new stdClass));
    }

    function testDeterminesWhetherTheModuleWasLoaded()
    {
        $this->assertEquals(false,         $this->slash->isLoaded('foo'));
        $this->slash->load('foo', new stdClass);
        $this->assertEquals(true,         $this->slash->isLoaded('foo'));
    }

    function testLoadsAnInstanceAndReturnsIt()
    {
        $this->slash->load('foo', new stdClass);
        $this->assertInstanceOf('stdClass', $this->slash->getInstance('foo'));
        $this->expectException('UnexpectedValueException');
        $this->slash->getInstance('bar');

    }

    function testDeterminesWhetherTheObjectHasTheMethod()
    {
        $instance = new DummyMethods2;

        $this->assertTrue($this->slash->hasMethod($instance, 'foo'));
        $this->assertFalse($this->slash->hasMethod($instance, 'bar'));
    }

    function testRunsAMethodAndReturnsTheOutput()
    {
        $this->slash->load('bar', new DummyMethods2);

        $this->assertEquals('baz', $this->slash->run('foo', ['baz']));
        $this->expectException('BadMethodCallException');
        $this->slash->run('food', ['bazr']);

    }

    function testDeterminesWhetherTheModuleExists()
    {
        $this->assertEquals(false,         $this->slash->hasModule('foobar'));
        $this->slash->addModule('foobar');
        $this->assertEquals(true,         $this->slash->hasModule('foobar'));
    }

    function testProvidesYouSomeSyntacticSugar()
    {
        $arguments = [new DummyMethods2];
        $this->assertEquals(Slash::methods($arguments[0]), $this->slash->run('methods', $arguments));
    }

    function testSavesItselfInAPropertyForFutureStaticCalls()
    {
        $closure = function()
        {
            return uniqid();
        };

        if (Slash::cache($closure) != Slash::cache($closure))
        {
            throw new \LogicException;
        }

        $this->assertTrue(true);
    }
}

class DummyMethods2 {

    public function foo($var = 'wow')
    {
        return $var;
    }

}
