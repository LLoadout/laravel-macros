<?php

namespace LLoadout\LaravelMacros\Tests;

use Illuminate\Support\Str;

class StrTests extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->createDummyprovider()->register();
    }

    public function testGetFile()
    {
        $this->assertEquals('Laravel Macros', Str::capitalizeWords('laravel macros'));
        $this->assertEquals('Dieter Coopman', Str::capitalizeWords('dieter coopman'));
    }
}
