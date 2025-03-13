<x-layout>
    <h1 class="text-2xl font-bold mb-4 dark:text-white">Client Details</h1>
    <div class="bg-white dark:bg-gray-800 shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @if ($client->premium)
            <div class="mb-4">
                <x-premium-badge />
            </div>
        @endif
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">ID:</label>
            <p class="dark:text-gray-300">{{ $client->id }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Name:</label>
            <p class="dark:text-gray-300">{{ $client->name }}</p>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Surname:</label>
            <p class="dark:text-gray-300">{{ $client->surname }}</p>
        </div>
        @if ($client->image_path)
            <div class="mb-4">
                <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Image:</label>
                <img src="{{ asset('storage/' . $client->image_path) }}" alt="Client Image" class="rounded">
            </div>
        @endif
        <div class="flex items-center justify-start gap-4">
            <a href="{{ route('clients.edit', $client) }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
            <form action="{{ route('clients.destroy', $client) }}" method="POST" class="inline"
                onsubmit="return confirm('Are you sure you want to delete this client?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
            </form>
        </div>
    </div>
    <a href="{{ route('clients.index') }}" class="hover:underline text-blue-500 dark:text-blue-300">Back to Clients</a>
</x-layout>
