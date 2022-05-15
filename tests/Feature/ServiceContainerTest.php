<?php

namespace Tests\Feature;

use App\Data\Bar;
use App\Data\Foo;
use Tests\TestCase;
use App\Data\Person;
use App\Services\HelloServiceIndonesia;

class ServiceContainerTest extends TestCase
{
    
    public function testDepedencyInjection()
    {
        $this->app->singleton(Foo::class, function(){
            return new Foo();
        });

        $this->app->singleton(Bar::class, function($app){
            return new Bar($app->make(Foo::class));
        });

        $foo = $this->app->make(Foo::class);
        $bar = $this->app->make(Bar::class);
        $bar1 = $this->app->make(Bar::class);

        self::assertEquals('foo and bar', $bar->getBar());
        self::assertSame($bar, $bar1);
    }

    public function testBind()
    {
        $this->app->singleton(Person::class, function(){
                return new Person('Yota', 'Nehru');
        });

        $person = $this->app->make(Person::class);
        $person1 = $this->app->make(Person::class);

        self::assertEquals('Yota', $person->firstname);
        self::assertEquals('Nehru', $person->lastname);
        self::assertSame($person, $person1);
    }

    public function testSingleton()
    {
        $person = new Person('Yota', 'Nehru');
        $this->app->instance(Person::class, $person);

        $person1 = $this->app->make(Person::class);
        $person2 = $this->app->make(Person::class);

        self::assertEquals('Yota', $person1->firstname);
        self::assertEquals('Nehru', $person2->lastname);
        self::assertSame($person, $person1);
        self::assertSame($person1, $person2);
    }

    public function testInterfaceBinding()
    {
        $this->app->singleton(HelloService::class, HelloServiceIndonesia::class);

        $helloservice = $this->app->make(HelloService::class);
        self::assertEquals('Hallo Yota', $helloservice->hello('Yota'));
    }
}
