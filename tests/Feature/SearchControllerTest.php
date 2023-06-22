<?php

use Tests\TestCase;

class SearchControllerTest extends TestCase
{
    public function testCanSearch()
    {
        $response = $this->get('/search/people?query=Luke');

        $response->assertStatus(200)
            ->assertJsonStructure(['results']);
    }
}
