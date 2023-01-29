<?php

use Slash\Collection;
class CollectionTest extends \PHPUnit\Framework\TestCase
{
    public function testCanMakeCollection(): void
    {
        $this->assertInstanceOf(Collection::class, collect([]));
    }

    public function testMap(): void
    {
        $this->assertEquals([1,2,3], collect([
            ['id' => 1],
            ['id' => 2],
            ['id' => 3],
        ])->map(fn ($item) => $item['id'])->all()
        );
    }
}
