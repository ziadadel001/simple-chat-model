<?php
use App\Events\MessageSent;
use Livewire\Volt\Component;
use Livewire\Attributes\On; // Import the On attribute for event listening

// Define an anonymous Livewire Volt component
new class extends Component
{
    /**
     * @var string[] Stores chat messages
     */
    public array $messages = [];

    /**
     * @var string Stores the user's input message
     */
    public string $message = '';

    /**
     * Dispatches the MessageSent event when a user sends a message.
     * This will broadcast the message in real-time.
     */
    public function addMessage()
    {
        // Ensure the user is authenticated before dispatching the event
        if (auth()->check()) {
            MessageSent::dispatch(auth()->user()->name, $this->message);
            $this->reset('message'); // Clear the input field after sending
        }
    }

    /**
     * Listens for the "MessageSent" event on the "messages" private channel.
     * When a message is broadcasted, it is added to the local messages array.
     */
    #[On('echo-private:messages,MessageSent')]
    public function onMessageSent($event)
    {
        // Debugging: Uncomment to check the received event data
        // dd($event);

        // Append the new message event to the messages array
        $this->messages[] = $event;
    }
}
?>


<div x-data="{ open: true }" >
    <div :class="{'-translate-y-0': open, 'translate-y-full': !open}" class="fixed transition-all duration-300 transform bottom-10 right-12 h-60 w-80">
        <div class="mb-2">
            <button @click="open = !open" type="button" :class="{ 'text-indigo-600 dark:text-white hover:bg-transparent': open }" class="w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-white rounded-lg hover:bg-indigo-400 dark:bg-indigo-600 dark:hover:bg-indigo-400">
                Chat
               
                <x-heroicon-o-chevron-up x-show="!open" x-cloak class="ms-auto block size-4" />
                <x-heroicon-o-chevron-down x-show="open" x-cloak class="ms-auto block size-4" />
    
            </button>
        </div>
        <div class="w-full h-full bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded overflow-auto flex flex-col px-2 py-4">
            <div x-ref="chatBox" class="flex-1 p-4 text-sm flex flex-col gap-y-1">
                @foreach($messages as $message)
                    <div><span class="text-indigo-600">{{ $message['name'] }}:</span> <span class="dark:text-white">{{ $message['text'] }}</span></div>
                @endforeach
            </div>
            <div>
                <form wire:submit.prevent="addMessage" class="flex gap-2">
                    <x-text-input wire:model="message" x-ref="messageInput" name="message" id="message" class="block w-full" />
                    <x-primary-button>
                        Send
                    </x-primary-button>
                </form>
            </div>
        </div>
    </div>
</div>