<?php

use PHPUnit\Framework\TestCase;

class useWithTest extends TestCase
{
    public function testUseWith(): void
    {
        $sum = function($a, $b): float|int|array { return $b + $a;  };
        $add1  = function ($v): int|float { return $v+1; };
        $result = \Slash\useWith($sum, $add1, $add1)(4, 5); // === 2

        $this->assertEquals(11, $result);
    }

    public function testUseWithArray(): void
    {
        $sum = function($a, $b): float|int|array { return $b + $a;  };
        $result = Slash\useWith($sum, Slash\getWith('a'), Slash\getWith('b'))(
            ['a' => 1], ['b' => 1]
        );

        $this->assertEquals(2, $result);
    }
}
