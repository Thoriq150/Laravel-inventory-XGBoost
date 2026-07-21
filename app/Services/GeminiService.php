<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GeminiService
{
    protected $apiKey;

    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = env('GEMINI_API_KEY');

        $this->baseUrl =
            'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent';
    }

    public function generate($prompt)
    {
        $response = Http::post(
            $this->baseUrl . '?key=' . $this->apiKey,
            [
                'contents' => [
                    [
                        'parts' => [
                            [
                                'text' => $prompt
                            ]
                        ]
                    ]
                ]
            ]
        );

        if ($response->failed()) {

                dd($response->body());
            }

        return $response->json();
    }
}