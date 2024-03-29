<?php

use PHPUnit\Framework\TestCase;
use Slash\Functions;

class FunctionsTest extends TestCase {

    /**
     * The instance of Utilities.
     *
     * @var Functions
     */
    protected $functions;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->functions = New Functions();
    }

    /**
     * @dataProvider valueCases
     */
    public function testArrayMethods($list, $method, $expected)
    {
        $this->assertEquals($expected, call_user_func([$this->functions, $method], $list));
    }

    public function valueCases()
    {
        return [
            'With cache' => [
                'list' => function () { return 'Hello'; },
                'method' => 'cache',
                'experted' => 'Hello',
            ],
            'With once' => [
                'list' => function () { return 'Hello'; },
                'method' => 'once',
                'experted' => null,
            ],
        ];
    }

    public function testWrap()
    {
        $this->assertEquals('Hello', $this->functions->wrap(function() { return 'Hello'; }, function($fn) { return $fn(); }));
    }

    public function testCompose()
    {
        $sum = function ($a, $b) {
            return $a + $b;
        };
        $functions = [
            Slash\reduceWith($sum),
            Slash\filterWith('Slash\isEven')
        ];
        $args = [[1,2,3,4]];
        $this->assertEquals(6, $this->functions->compose($functions, $args));
    }

    public function testAfter()
    {
        $closure = function()
        {
            return 'foo';
        };

        $this->assertEquals(null, $this->functions->after(2, $closure));
        $this->assertEquals(null, $this->functions->after(2, $closure));
        $this->assertEquals('foo', $this->functions->after(2, $closure));
    }
}
