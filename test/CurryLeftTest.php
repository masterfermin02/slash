<?php

use PHPUnit\Framework\TestCase;
use function Slash\curryLeft;

class curryLeftTest extends TestCase {

    public function testCurryRunOneFunction(): void
    {
        $isEven = curryLeft(
            Slash\filterWith('Slash\isEven')
        );
        $expected = [2,4];
        $this->assertEquals(array_values($expected), array_values($isEven([1,2,3,4])));
    }
}
