<?php

namespace App\Http\Controllers;

use App\Services\SwapiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    private SwapiService $swapiService;

    public function __construct(SwapiService $swapiService)
    {
        $this->swapiService = $swapiService;
    }

    public function __invoke(Request $request, $category)
    {
        $query = $request->get('query', '');

        if (empty($query)) {
            return response()->json(['results' => []]);
        }

        $data = $this->swapiService->searchData($category, $query);

        return response()->json($data);
    }
}
