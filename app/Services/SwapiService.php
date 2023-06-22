<?php

namespace App\Services;

use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;

class SwapiService
{
    public function searchData($category, $query): array
    {
        $response = Http::get("https://swapi.dev/api/{$category}", [
            'search' => $query,
        ]);

        if (! $response->ok()) {
            return ['results' => []];
        }

        $data = $response->json();

        return ['results' => $data['results']];
    }

    public function getData($category, $id)
    {
        $response = Http::get("https://swapi.dev/api/{$category}/{$id}");

        if (! $response->ok()) {
            abort(404);
        }

        $data = $response->json();

        if (isset($data['films'])) {
            $data['films'] = $this->getRelatedData($data['films']);
        }

        if (isset($data['characters'])) {
            $data['characters'] = $this->getRelatedData($data['characters']);
        }

        return $data;
    }

    public function getRelatedData(array $urls): array
    {
        $requests = $urls;

        $responses = Http::pool(function (Pool $pool) use ($requests) {
            return array_map(fn($value) => $pool->get($value), $requests);
        });

        $relatedData = [];
        foreach ($responses as $response) {
            $relatedDataDetail = $response->json();
            $relatedDataId = $this->getIdFromUrl($relatedDataDetail['url']);
            $relatedData[] = [
                'name' => $relatedDataDetail['name'] ?? $relatedDataDetail['title'],
                'id'   => $relatedDataId,
            ];
        }

        return $relatedData;
    }

    private function getIdFromUrl($url): bool|string
    {
        $urlSegments = explode('/', trim($url, '/'));
        return end($urlSegments);
    }
}
