<?php

use PHPUnit\Framework\TestCase;

class walkTest extends TestCase {

    public function testWalk(): void
    {
        $expected = [2,3,4,5,6,7,8,9,10,11];
        $data = [1,2,3,4,5,6,7,8,9,10];
        $actual = [];
        Slash\walk($data, function ($n) use($actual): void {
            $n++;
        });

        $this->assertEquals($expected[3], $data[3] + 1);
    }
}
