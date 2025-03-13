<x-layout>
    <h1 class="text-2xl font-bold mb-4 dark:text-white">Edit Client</h1>
    <x-client-form :action="route('clients.update', $client)" method="PUT" buttonText="Update" :client="$client" />
</x-layout>
