<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\HelloWorldService;

class HelloWorldServiceTest extends TestCase
{
    public function test_generate_helloworld_until_6()
    {
        $result = HelloWorldService::generate(6);

        $this->assertEquals(
            [1, 2, 3, 'hello', 'world', 6],
            $result
        );
    }

    public function test_generate_helloworld_until_20()
    {
        $result = HelloWorldService::generate(20);

        $this->assertEquals('hello', $result[3]);       // 4
        $this->assertEquals('world', $result[4]);       // 5
        $this->assertEquals('helloworld', $result[19]); // 20
    }
}
