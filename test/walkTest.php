<?php

use PHPUnit\Framework\TestCase;

class walkTest extends TestCase {

    public function testWalk()
    {
        $experted = [2,3,4,5,6,7,8,9,10,11];
        $data = [1,2,3,4,5,6,7,8,9,10];
        $actual = [];
        Slash\walk($data, function ($n) use($actual) {
            $n++;
        });

        $this->assertEquals($experted[3], $data[3] + 1);
    }
}
