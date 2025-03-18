## Required Packages

This project utilizes the following packages:

-   **Breeze**: A simple authentication scaffolding for Laravel.
-   **Livewire Volt**: A lightweight and powerful way to build Livewire components using concise syntax.
-   **Reverb**: A Laravel event broadcasting service for real-time interactions.
-   **Prompts**: A package for handling user input in CLI applications.
-   **Blade UI Kit - Heroicons**: A set of beautiful icons for Blade components.

---

## Setting Up the Project

Follow these steps to run the project successfully:

1. Start the Laravel server:
    ```sh
    php artisan serve
    ```
2. Start the Reverb server:
    ```sh
    php artisan reverb:start
    ```
3. Run the Vite development server:
    ```sh
    npm run dev
    ```

Once all services are running, the chat system should function correctly.

---

## Testing the Chat System

You can test the chat functionality by manually sending a message from the CLI:

```sh
php artisan send:message
```

This command will dispatch a message event, which will be received and displayed in the chat automatically.

---

## JavaScript Code for Listening to Events

Ensure the following JavaScript code is included to listen for incoming messages:

```javascript
// Subscribe to the 'messages' channel using Laravel Echo
window.Echo.channel("messages")
    // Listen for the 'MessageSent' event on this channel
    .listen("MessageSent", (e) => {
        // Log the event data to the console for debugging
        console.log(e);
    });
```

This will allow real-time updates in the chat interface whenever a new message is sent.

---

With this setup, your real-time chat should work smoothly
