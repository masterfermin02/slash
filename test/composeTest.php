<?php

use PHPUnit\Framework\TestCase;
use function Slash\compose;
use function Slash\filterWith;
use function Slash\reduceWith;

class composeTest extends TestCase {

    public function testComposeRunOneFunction()
    {
        $pipelines = compose(
            Slash\filterWith('Slash\isEven')
        );
        $experted = [2,4];
        $this->assertEquals(array_values($experted), array_values($pipelines([1,2,3,4])));
    }


    public function testComposeRunMoreThanOneFunction()
    {
        $sum = function ($a, $b) {
            return $a + $b;
        };
        $pipelines = compose(
           Slash\reduceWith($sum),
            Slash\filterWith('Slash\isEven')
        );
        $experted = 6;
        $this->assertEquals($experted, $pipelines([1,2,3,4]));
    }

    public function testComposeRunMoreThanTwoFunctions()
    {
        $sum = function ($a, $b) {
            return $a + $b;
        };
        $pipelines = compose(
            function ($sum) { return $sum * 5; },
            Slash\reduceWith($sum),
            Slash\filterWith('Slash\isEven')
        );
        $experted = 6 * 5;
        $this->assertEquals($experted, $pipelines([1,2,3,4]));
    }

    public function testComposeRunMoreThanThreeFunctions()
    {
        $sum = function ($a, $b) {
            return $a + $b;
        };
        $pipelines = compose(
            function ($sum) { return $sum * 5; },
            function ($sum) { return $sum * 5; },
            Slash\reduceWith($sum),
            Slash\filterWith('Slash\isEven')
        );
        $experted = 6 * 5 * 5;
        $this->assertEquals($experted, $pipelines([1,2,3,4]));
    }
}
