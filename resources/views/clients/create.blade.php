<x-layout>
    <h1 class="text-2xl font-bold mb-4 dark:text-white">Create Client</h1>
    <x-client-form :action="route('clients.store')" method="POST" buttonText="Create" :client="null" />
</x-layout>
