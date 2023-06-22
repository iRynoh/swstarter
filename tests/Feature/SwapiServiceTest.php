<?php

use App\Services\SwapiService;
use Tests\TestCase;

class SwapiServiceTest extends TestCase
{
    protected $swapiService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->swapiService = new SwapiService;
    }

    public function testCanSearchPeople()
    {
        $result = $this->swapiService->searchData('people', 'Luke');

        $this->assertIsArray($result);
        $this->assertArrayHasKey('results', $result);
        $this->assertGreaterThanOrEqual(1, count($result['results']));
        $this->assertEquals('Luke Skywalker', $result['results'][0]['name']);
    }
}
