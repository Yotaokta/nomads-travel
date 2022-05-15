<?php

namespace App\Data;

class Bar
{
    public Foo $foo;

    public function __construct(Foo $foo)
    {
        $this->foo = $foo;
    }

    public function getBar()
    {
        return $this->foo->getFoo() . ' and bar';
    }
}
