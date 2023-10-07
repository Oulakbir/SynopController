<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Http\Request;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle(Request $request)
    {
        $botman = app('botman');
        $engine = 'text-davinci-003'; 

        $botman->hears('{message}', function (BotMan $bot, $message) use ($engine) {
            $response = OpenAI::completions()->create([
                'model' => $engine,
                'prompt' => $message,
                'max_tokens' => 100,
                'temperature' => 0.7,
            ]);

            $chatbotResponse = $response['choices'][0]['text'];

            // Envoyer la réponse à l'utilisateur
            $bot->reply($chatbotResponse);
        });

        $botman->listen();
    }
}
