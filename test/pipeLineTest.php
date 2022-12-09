<?php

use PHPUnit\Framework\TestCase;
use function Slash\getWith;
use function Slash\pipeLine;
use function Slash\filterWith;
use function Slash\pluckWith;
use function Slash\reduceWith;
use function Slash\useWith;
use function Slash\equalTo;

class pipeLineTest extends TestCase {

    public function testComposeRunOneFunction()
    {
        $composed = pipeLine(
            Slash\filterWith('Slash\isEven')
        );
        $expected = [2,4];
        $this->assertEquals(array_values($expected), array_values($composed([1,2,3,4])));
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
        $expected = 6;
        $this->assertEquals($expected, $pipelines([1,2,3,4]));
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
        $expected = 6 * 5;
        $this->assertEquals($expected, $pipelines([1,2,3,4]));
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
        $expected = 6 * 5 * 5;
        $this->assertEquals($expected, $pipelines([1,2,3,4]));
    }

    public function testAverageCaculation()
    {
        $withinMale             = useWith(equalTo('male'), getWith('gender'));
        $filterByMale           = filterWith($withinMale);
        $caculateAverageMaleAge = Slash\pipeLine(
            $filterByMale,
            pluckWith('age'),
            'Slash\average'
        );
        $data = [
            ['name' => 'John', 'age' => 12, 'gender' => 'male'],
            ['name' => 'Jane', 'age' => 34, 'gender' => 'female'],
            ['name' => 'Pete', 'age' => 23, 'gender' => 'male'],
            ['name' => 'Mark', 'age' => 11, 'gender' => 'male'],
            ['name' => 'Mary', 'age' => 42, 'gender' => 'female'],
        ];
        $avgMaleAge = $caculateAverageMaleAge($data);
        $expected = (12 + 23 + 11) / 3;
        $this->assertEquals($expected, $avgMaleAge);
    }
}
