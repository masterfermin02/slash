<?php

use PHPUnit\Framework\TestCase;

class GroupTest extends TestCase {

    protected $records = [
        ['id' => 1, 'value1' => 5, 'value2' => 10],
        ['id' => 2, 'value1' => 50, 'value2' => 100],
        ['id' => 1, 'value1' => 2, 'value2' => 2],
        ['id' => 2, 'value1' => 15, 'value2' => 20],
        ['id' => 3, 'value1' => 15, 'value2' => 20],
    ];

    public function testGroupByID(): void
    {
        $grouped = slash()->groupBy($this->records, 'id');
        $expected = [
            1 => [ [ "id" => 1, "value1" => 5, "value2" => 10 ], [ "id" => 1, "value1" => 1, "value2" => 2 ] ],
            2 => [ [ "id" => 2, "value1" => 50, "value2" => 100 ], [ "id" => 2, "value1" => 15, "value2" => 20 ] ],
            3 => [ [ "id" => 3, "value1" => 15, "value2" => 20 ] ]
        ];

        $this->assertEquals($expected[3], $grouped[3]);
    }
}
