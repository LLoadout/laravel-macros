<?php

namespace LLoadout\LaravelMacros\Tests;

use LLoadout\LaravelMacros\ConvertMacros\Convert;

class ConvertTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->createDummyprovider()->register();
    }

    public function testObjectAsInput()
    {
        $test = new \stdClass();
        $test->name = "Coopman";
        $test->firstname = "Dieter";

        $this->assertJson(Convert::toJson($test));
        $this->assertIsArray(Convert::toArray($test));
        $this->assertIsObject(Convert::toObject($test));
    }

    public function testArrayAsInput()
    {
        $test = ["name" => "Coopman", "firstname" => "Dieter"];

        $this->assertJson(Convert::toJson($test));
        $this->assertIsArray(Convert::toArray($test));
        $this->assertIsObject(Convert::toObject($test));
    }

    public function testJsonAsInput()
    {
        $test = '{"name":"Coopman","firstname":"Dieter"}';

        $this->assertJson(Convert::toJson($test));
        $this->assertIsArray(Convert::toArray($test));
        $this->assertIsObject(Convert::toObject($test));
    }

    public function testNested()
    {
        $test = (array)["test" => "a", "b" => (object) ['name' => 'test']];
        $this->assertIsObject($test['b']);

        $test = Convert::toArray($test);
        $this->assertIsArray($test['b']);
    }
}
