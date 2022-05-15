<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use Tests\TestCase;

class DepedencyInjectionTest extends TestCase
{
    
    public function testDepedecyInjection()
    {
            $foo = new Foo();
            $bar = new Bar($foo);

            self::assertEquals('foo and bar', $bar->getBar());
    }
}
