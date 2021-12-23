<?php

namespace LLoadout\LaravelMacros\Tests;

use LLoadout\LaravelMacros\LaravelMacrosServiceProvider;
use Orchestra\Testbench\TestCase as TestBench;
use ReflectionClass;

class TestCase extends TestBench
{
    protected function createDummyprovider(): LaravelMacrosServiceProvider
    {
        $reflectionClass = new ReflectionClass(LaravelMacrosServiceProvider::class);

        return $reflectionClass->newInstanceWithoutConstructor();
    }
}
