<?php

namespace App\Console\Commands;

use App\Events\MessageSent;
use Illuminate\Console\Command;

use function Laravel\Prompts\text;

class SendMessageCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:message';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send message to the chat ';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Prompt user to enter their name
        $name = text(
            label: 'What is your name?', // Display label for input
            required: true // Make input mandatory
        );

        // Prompt user to enter their message
        $text = text(
            label: 'What is your message?', // Display label for input
            required: true // Make input mandatory
        );

        // Dispatch the MessageSent event with the name and message as parameters
        MessageSent::dispatch($name, $text);
    }
}
