<?php

namespace LLoadout\LaravelMacros\Tests;

class CollectionsTests extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->createDummyprovider()->register();
    }

    public function testWhereStartsWith()
    {
        $c = collect([['id' => 1, 'name' => 'A'], ['id' => 2, 'name' => 'B'], ['id' => 3, 'name' => 'AB'], ['id' => 4, 'name' => 'ABC']]);
        $this->assertCount(3, $c->whereStartsWith('name', 'A'));
        $this->assertCount(1, $c->whereStartsWith('name', 'B'));
        $this->assertCount(0, $c->whereStartsWith('name', 'C'));
        $this->assertCount(2, $c->whereStartsWith('name', 'AB'));
        $this->assertCount(1, $c->whereStartsWith('name', 'ABC'));

        $this->assertCount(3, $c->whereStartsWith('name', 'a', false));
        $this->assertCount(1, $c->whereStartsWith('name', 'b', false));
        $this->assertCount(0, $c->whereStartsWith('name', 'c', false));
        $this->assertCount(2, $c->whereStartsWith('name', 'aB', false));
        $this->assertCount(1, $c->whereStartsWith('name', 'Abc', false));
    }

    public function testWhereEndsWith()
    {
        $c = collect([['id' => 1, 'name' => 'A'], ['id' => 2, 'name' => 'B'], ['id' => 3, 'name' => 'AB'], ['id' => 4, 'name' => 'ABC']]);
        $this->assertCount(1, $c->whereEndsWith('name', 'A'));
        $this->assertCount(2, $c->whereEndsWith('name', 'B'));
        $this->assertCount(1, $c->whereEndsWith('name', 'C'));
        $this->assertCount(1, $c->whereEndsWith('name', 'BC'));
        $this->assertCount(1, $c->whereEndsWith('name', 'ABC'));

        $this->assertCount(1, $c->whereEndsWith('name', 'a', false));
        $this->assertCount(2, $c->whereEndsWith('name', 'b', false));
        $this->assertCount(1, $c->whereEndsWith('name', 'c', false));
        $this->assertCount(1, $c->whereEndsWith('name', 'aB', false));
        $this->assertCount(1, $c->whereEndsWith('name', 'Abc', false));
    }

    public function testWhereContains()
    {
        $c = collect([['id' => 1, 'name' => 'A'], ['id' => 2, 'name' => 'B'], ['id' => 3, 'name' => 'AB'], ['id' => 4, 'name' => 'ABC']]);
        $this->assertCount(3, $c->whereContains('name', 'A'));
        $this->assertCount(3, $c->whereContains('name', 'B'));
        $this->assertCount(1, $c->whereContains('name', 'C'));
        $this->assertCount(1, $c->whereContains('name', 'BC'));
        $this->assertCount(1, $c->whereContains('name', 'ABC'));
        $this->assertCount(0, $c->whereContains('name', 'D'));

        $this->assertCount(3, $c->whereContains('name', 'a', false));
        $this->assertCount(3, $c->whereContains('name', 'b', false));
        $this->assertCount(1, $c->whereContains('name', 'c', false));
        $this->assertCount(1, $c->whereContains('name', 'bC', false));
        $this->assertCount(1, $c->whereContains('name', 'AbC', false));
        $this->assertCount(0, $c->whereContains('name', 'd', false));
    }
}
