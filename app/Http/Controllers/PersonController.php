<?php

namespace App\Http\Controllers;

use App\Services\SwapiService;
use Inertia\Inertia;

class PersonController extends Controller
{
    private SwapiService $swapiService;

    public function __construct(SwapiService $swapiService)
    {
        $this->swapiService = $swapiService;
    }

    public function __invoke($id)
    {
        $person = $this->swapiService->getData('people', $id);

        return Inertia::render('Person', [
            'person' => $person,
        ]);
    }
}
