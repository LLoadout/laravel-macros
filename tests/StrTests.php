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

    public function testHighlightWords()
    {
        $sentence = Str::highlightWords('this is a sentence', ['this', 'sentence'], '<span class="light">');
        $this->assertEquals('<span class="light">this</span class="light"> is a <span class="light">sentence</span class="light">', $sentence);
        $sentence = Str::highlightWords('this is a sentence', ['this', 'sentence']);
        $this->assertEquals('<b>this</b> is a <b>sentence</b>', $sentence);
        $sentence = Str::highlightWords('this is a sentence', 'this');
        $this->assertEquals('<b>this</b> is a sentence', $sentence);
    }
}
