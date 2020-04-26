<?php

use PHPUnit\Framework\TestCase;
use function Slash\flip;
use function Slash\pipeLine;
use function Slash\filterWith;
use function Slash\reduceWith;

class pipeLineTest extends TestCase {

    public function testComposeRunOneFunction()
    {
        $composed = pipeLine(
            Slash\filterWith('Slash\isEven')
        );
        $experted = [2,4];
        $this->assertEquals(array_values($experted), array_values($composed([1,2,3,4])));
    }


    public function testComposeRunMoreThanOneFunction()
    {
        $sum = function ($a, $b) {
            return $a + $b;
        };
        $pipelines = pipeLine(
            filterWith('Slash\isEven'),
            reduceWith($sum)
        );
        $experted = 6;
        $this->assertEquals($experted, $pipelines([1,2,3,4]));
    }

    public function testComposeRunMoreThanTwoFunctions()
    {
        $sum = function ($a, $b) {
            return $a + $b;
        };
        $pipelines = pipeLine(
            filterWith('Slash\isEven'),
            reduceWith($sum),
            function ($sum) { return $sum * 5; }
        );
        $experted = 6 * 5;
        $this->assertEquals($experted, $pipelines([1,2,3,4]));
    }

    public function testComposeRunMoreThanThreeFunctions()
    {
        $sum = function ($a, $b) {
            return $a + $b;
        };
        $pipelines = pipeLine(
            Slash\filterWith('Slash\isEven'),
            Slash\reduceWith($sum),
            function ($sum) { return $sum * 5; },
            function ($sum) { return $sum * 5; }
        );
        $experted = 6 * 5 * 5;
        $this->assertEquals($experted, $pipelines([1,2,3,4]));
    }
}
