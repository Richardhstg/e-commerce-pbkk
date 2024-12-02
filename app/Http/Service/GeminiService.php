<?php

namespace App\Services;

use Google\Gemini\Client; // Pastikan namespace sesuai dengan library yang terinstal

class GeminiService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'api_key' => config('gemini.api_key'),
        ]);
    }

    public function sendMessage(string $message): string
    {
        try {
            $response = $this->client->chat(['input' => $message]);
            return $response['reply'] ?? 'No response from AI.';
        } catch (\Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}
