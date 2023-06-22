<?php

namespace App\Http\Controllers;

use App\Services\SwapiService;
use Illuminate\Http\Client\Pool;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class FilmController extends Controller
{
    private SwapiService $swapiService;

    public function __construct(SwapiService $swapiService)
    {
        $this->swapiService = $swapiService;
    }

    public function __invoke($id)
    {
        $film = $this->swapiService->getData('films', $id);

        return Inertia::render('Film', [
            'film' => $film,
        ]);
    }
}
