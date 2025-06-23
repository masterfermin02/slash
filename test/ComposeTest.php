<?php

use PHPUnit\Framework\TestCase;
use function Slash\compose;
use function Slash\filterWith;
use function Slash\reduceWith;

class composeTest extends TestCase {

    public function testComposeRunOneFunction(): void
    {
        $pipelines = compose(
            Slash\filterWith('Slash\isEven')
        );
        $expected = [2,4];
        $this->assertEquals(array_values($expected), array_values($pipelines([1,2,3,4])));
    }


    public function testComposeRunMoreThanOneFunction(): void
    {
        $sum = function ($a, $b): float|int|array {
            return $a + $b;
        };
        $pipelines = compose(
           Slash\reduceWith($sum),
            Slash\filterWith('Slash\isEven')
        );
        $expected = 6;
        $this->assertEquals($expected, $pipelines([1,2,3,4]));
    }

    public function testComposeRunMoreThanTwoFunctions(): void
    {
        $sum = function ($a, $b): float|int|array {
            return $a + $b;
        };
        $pipelines = compose(
            function ($sum): int|float { return $sum * 5; },
            Slash\reduceWith($sum),
            Slash\filterWith('Slash\isEven')
        );
        $expected = 6 * 5;
        $this->assertEquals($expected, $pipelines([1,2,3,4]));
    }

    public function testComposeRunMoreThanThreeFunctions(): void
    {
        $sum = function ($a, $b): float|int|array {
            return $a + $b;
        };
        $pipelines = compose(
            function ($sum): int|float { return $sum * 5; },
            function ($sum): int|float { return $sum * 5; },
            Slash\reduceWith($sum),
            Slash\filterWith('Slash\isEven')
        );
        $expected = 6 * 5 * 5;
        $this->assertEquals($expected, $pipelines([1,2,3,4]));
    }
}
