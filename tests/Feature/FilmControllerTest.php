<?php

use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class FilmControllerTest extends TestCase
{
    public function testCanGetFilm()
    {
        $response = $this->get('/film/1');

        $response->assertStatus(200)
            ->assertInertia(fn($page) => $page->component('Film'));
    }

    public function testCanGetFilmMock()
    {
        $response = $this->get('/film/1');

        $response->assertStatus(200)
            ->assertInertia(fn($page) => $page->component('Film')
                ->where('film.title', 'A New Hope'));
    }

    public function testReturns404OnNotFound()
    {
        $response = $this->get('/film/999999');

        $response->assertStatus(404);
    }
}
