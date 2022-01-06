<?php

namespace LLoadout\LaravelMacros\Tests;

use LLoadout\LaravelMacros\VariableMacros\Variable;

class VariableTest extends TestCase
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

        $this->assertJson(Variable::toJson($test));
        $this->assertIsArray(Variable::toArray($test));
        $this->assertIsObject(Variable::toObject($test));
    }

    public function testArrayAsInput()
    {
        $test = ["name" => "Coopman", "firstname" => "Dieter"];

        $this->assertJson(Variable::toJson($test));
        $this->assertIsArray(Variable::toArray($test));
        $this->assertIsObject(Variable::toObject($test));
    }

    public function testJsonAsInput()
    {
        $test = '{"name":"Coopman","firstname":"Dieter"}';

        $this->assertJson(Variable::toJson($test));
        $this->assertIsArray(Variable::toArray($test));
        $this->assertIsObject(Variable::toObject($test));
    }

    public function testNested()
    {
        $test = (array)["test" => "a", "b" => (object) ['name' => 'test']];
        $this->assertIsObject($test['b']);

        $test = Variable::toArray($test);
        $this->assertIsArray($test['b']);
    }

    public function testWhen()
    {
        $variable = "";
        $variable = Variable::when($variable, "", null);
        $this->assertNull($variable);

        $variable = "-";
        $variable = Variable::when($variable, "", null);

        $this->assertEquals('-', $variable);
    }
}
