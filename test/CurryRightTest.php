<?php

use PHPUnit\Framework\TestCase;
use function Slash\curryRight;

class curryRightTest extends TestCase {

    public function testCurryRunOneFunction(): void
    {
        $isEven = curryRight(
            Slash\filterWith('Slash\isEven')
        );
        $expected = [2,4];
        $this->assertEquals(array_values($expected), array_values($isEven([1,2,3,4])));
    }
}
