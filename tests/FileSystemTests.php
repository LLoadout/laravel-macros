<?php

namespace LLoadout\LaravelMacros\Tests;

use Illuminate\Support\Facades\File;

class FileSystemTests extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->createDummyprovider()->register();
    }

    public function testGetFile()
    {
        $this->assertEquals('json', File::getFile('./composer.json')->getExtension());
    }
}
