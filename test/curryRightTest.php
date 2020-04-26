<?php

use PHPUnit\Framework\TestCase;
use function Slash\curry_right;

class curryRightTest extends TestCase {

    public function testCurryRunOneFunction()
    {
        $isEven = curry_right(
            Slash\filterWith('Slash\isEven')
        );
        $experted = [2,4];
        $this->assertEquals(array_values($experted), array_values($isEven([1,2,3,4])));
    }
}
