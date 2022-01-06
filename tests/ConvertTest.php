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

        $this->assertJson(Convert::variable($test)->toJson());
        $this->assertIsArray(Convert::variable($test)->toArray());
        $this->assertIsObject(Convert::variable($test)->toObjects());
    }

    public function testArrayAsInput()
    {
        $test = ["name" => "Coopman", "firstname" => "Dieter"];

        $this->assertJson(Convert::variable($test)->toJson());
        $this->assertIsArray(Convert::variable($test)->toArray());
        $this->assertIsObject(Convert::variable($test)->toObjects());
    }

    public function testJsonAsInput()
    {
        $test = '{"name":"Coopman","firstname":"Dieter"}';

        $this->assertJson(Convert::variable($test)->toJson());
        $this->assertIsArray(Convert::variable($test)->toArray());
        $this->assertIsObject(Convert::variable($test)->toObjects());
    }

    public function testNested(){
        $test = (array)["test" => "a", "b" => (object) ['name' => 'test']];
        $this->assertIsObject($test['b']);

        $test = Convert::variable($test)->toArray();
        $this->assertIsArray($test['b']);
    }

}
