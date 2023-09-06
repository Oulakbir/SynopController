<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Http\Request;


class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle(Request $request)
    {
        $botman = app('botman');
        
        $botman->hears('{message}', function(BotMan $bot, $message) {
            $lowercaseMessage = strtolower($message);
            
            if (strpos($lowercaseMessage, 'synoptic') !== false) {
                $this->handleSynopticQuestion($bot, $lowercaseMessage);
            } else {
                $bot->reply("I'm sorry, I'm not sure how to respond to that.");
            }
        });

        $botman->listen();
    }

    /**
     * Handle synoptic-related questions.
     */
    protected function handleSynopticQuestion(BotMan $bot, $message)
    {
        if (strpos($message, 'what is a synoptic message') !== false) {
            $this->replySynopticDefinition($bot);
        } elseif (strpos($message, 'importance of synoptic messages') !== false) {
            $this->replySynopticImportance($bot);
        } else {
            $bot->reply("I'm sorry, I don't have information about that specific question.");
        }
    }

    /**
     * Reply with the definition of a synoptic message.
     */
    protected function replySynopticDefinition(BotMan $bot)
    {
        $bot->reply("A synoptic message is a concise and informative summary of important information or data.");
    }

    /**
     * Reply with the importance of synoptic messages.
     */
    protected function replySynopticImportance(BotMan $bot)
    {
        $bot->reply("Synoptic messages are important because they provide a quick overview of key details, helping individuals to understand complex topics at a glance.");
    }
}
