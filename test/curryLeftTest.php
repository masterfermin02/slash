<?php

use PHPUnit\Framework\TestCase;
use function Slash\curryLeft;

class curryLeftTest extends TestCase {

    public function testCurryRunOneFunction()
    {
        $isEven = curryLeft(
            Slash\filterWith('Slash\isEven')
        );
        $experted = [2,4];
        $this->assertEquals(array_values($experted), array_values($isEven([1,2,3,4])));
    }
}
