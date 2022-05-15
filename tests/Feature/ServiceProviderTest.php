<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use Tests\TestCase;
use App\Services\HelloService;

class ServiceProviderTest extends TestCase
{
    
    public function testServiceProvider()
    {
        $foo = $this->app->make(Foo::class);
        $foo1 = $this->app->make(Foo::class);

        self::assertSame($foo, $foo1);

        $bar1 = $this->app->make(Bar::class);
        $bar2 = $this->app->make(Bar::class);

        self::assertSame($bar1, $bar2);

        self::assertSame($foo, $bar1->foo);
        self::assertSame($foo1, $bar2->foo);

    }

    public function testPropertySingleton()
    {
        $helloservice1 = $this->app->make(HelloService::class);
        $helloservice2 = $this->app->make(HelloService::class);
        
        self::assertSame($helloservice1, $helloservice2);
    }
}
