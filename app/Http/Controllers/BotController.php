<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
class BotController extends Controller
{
    public function index()
    {
        return view('bot');
    }

    public function sendMessage(Request $request)
    {
        $userMessage = $request->input('message');
        $client = new Client();
        // $command = "python python/bot.py '$userMessage' 2>&1"; // 2>&1 redirige la sortie d'erreur vers la sortie standard
        // shell_exec($command);
        // set_time_limit(30);
        
        $response = $client->post('http://localhost:5000/api/bot', [
            'json' => ['message' => $userMessage]
        ]);
        
        $botResponse = json_decode($response->getBody(), true)['response'];
        return view('bot', ['botResponse' => $botResponse]);
    }
    public function botEndpoint(Request $request)
    {
        // Récupérez le message de l'utilisateur depuis la requête
        $userMessage = $request->input('message');

        // Exécutez le script bot.py en utilisant subprocess
        $command = [
            'python',                   // Commande Python
            'python/bot.py',           // Chemin vers le script bot.py
            $userMessage                // Argument pour le message de l'utilisateur
        ];

        try {
            // Exécutez le script Python en arrière-plan
            $process = new Process($command);
            $process->start();

            // Attendre la fin de l'exécution du script (si nécessaire)
            // $process->wait();

            // Laissez le script Python s'exécuter en arrière-plan
            $botResponse = 'Le script bot.py est en cours d\'exécution en arrière-plan.';
        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'exécution du script bot.py : ' . $e->getMessage());
            $botResponse = 'Erreur lors de l\'exécution du bot.';
        }

        // Renvoyez la réponse du bot au format JSON
        return response()->json(['response' => $botResponse]);
    }

}