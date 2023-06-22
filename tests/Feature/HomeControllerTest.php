<?php


use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    public function testCanViewHome()
    {
        $response = $this->get('/');

        $response->assertStatus(200)
            ->assertInertia(fn($page) => $page->component('Home'));
    }
}
