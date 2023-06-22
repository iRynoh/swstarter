<?php

use Tests\TestCase;
use Inertia\Testing\AssertableInertia as Assert;

class PersonControllerTest extends TestCase
{
    public function testCanGetPerson()
    {
        $response = $this->get('/person/1');

        $response->assertStatus(200)
            ->assertInertia(fn($page) => $page->component('Person'));
    }

    public function testCanSeePersonWithName()
    {
        $response = $this->get('/person/16');

        $response->assertStatus(200)
            ->assertInertia(fn(Assert $page) => $page->component('Person')
                ->where('person.name', 'Jabba Desilijic Tiure'));
    }

    public function testReturns404OnNotFound()
    {
        $response = $this->get('/person/999999');

        $response->assertStatus(404);
    }
}
