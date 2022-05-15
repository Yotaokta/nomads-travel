<?php

namespace Tests\Feature;

use Tests\TestCase;

class ConfigurationTest extends TestCase
{
    public function testConfig()
    {
        $firstname = config('contoh.author.firstname');
        $lastname = config('contoh.author.lastname');
        $email = config('contoh.email');
        $web = config('contoh.web');

        self::assertEquals('Muhammad Yota', $firstname);
        self::assertEquals('Nehru Onodera', $lastname);
        self::assertEquals('contoh@gmail.com', $email);
        self::assertEquals('yotanehru.com', $web);
    }
}
