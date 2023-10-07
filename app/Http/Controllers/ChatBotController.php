<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ChatbotController extends Controller
{
    public function handle(Request $request)
    {
        $message = $request->input('message');
        $apiKey = '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';
        $gpt3Endpoint = 'https://api.openai.com/v1/engines/davinci/completions';

        $client = new Client();

        $response = $client->post($gpt3Endpoint, [
            'headers' => [
                'Authorization' => 'Bearer ' . $apiKey,
            ],
            'json' => [
                'prompt' => $message,
                'max_tokens' => 50, // Limitez la longueur de la réponse si nécessaire
            ],
        ]);

        $result = json_decode($response->getBody(), true);
        $chatbotResponse = $result['choices'][0]['text'];

        return response()->json(['response' => $chatbotResponse]);
    }
}
