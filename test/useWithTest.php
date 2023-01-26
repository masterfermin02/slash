<?php

use PHPUnit\Framework\TestCase;

class useWithTest extends TestCase
{
    public function testUseWith()
    {
        $sum = function($a, $b) { return $b + $a;  };
        $add1  = function ($v) { return $v+1; };
        $result = \Slash\useWith($sum, $add1, $add1)(4, 5); // === 2

        $this->assertEquals(11, $result);
    }

    public function testUseWithArray()
    {
        $sum = function($a, $b) { return $b + $a;  };
        $result = Slash\useWith($sum, Slash\getWith('a'), Slash\getWith('b'))(
            ['a' => 1], ['b' => 1]
        );

        $this->assertEquals(2, $result);
    }
}
