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

With this setup, your real-time chat should work smoothly
