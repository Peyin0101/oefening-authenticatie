<x-layout>
    <h1 class="text-2xl font-bold mb-4 dark:text-white">Clients</h1>
    <a href="{{ route('clients.create') }}"
        class="mb-4 inline-block bg-blue-500 text-white py-2 px-4 rounded dark:bg-blue-700">Add New Client</a>
    <table class="min-w-full bg-white dark:bg-gray-800">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b dark:border-gray-500 text-left dark:text-gray-300">ID</th>
                <th class="py-2 px-4 border-b dark:border-gray-500 text-left dark:text-gray-300">Name</th>
                <th class="py-2 px-4 border-b dark:border-gray-500 text-left dark:text-gray-300">Surname</th>
                <th class="py-2 px-4 border-b dark:border-gray-500 text-left dark:text-gray-300">Premium</th>
                <th class="py-2 px-4 border-b dark:border-gray-500 text-left dark:text-gray-300">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <td class="py-2 px-4 border-b dark:border-gray-700 dark:text-gray-300">
                        <a href="{{ route('clients.show', $client) }}" class="text-blue-500 dark:text-blue-300">
                            {{ $client->id }}
                        </a>
                    </td>
                    <td class="py-2 px-4 border-b dark:border-gray-700 dark:text-gray-300">
                        {{ $client->name }}</td>
                    <td class="py-2 px-4 border-b dark:border-gray-700 dark:text-gray-300">
                        {{ $client->surname }}</td>
                    <td class="py-2 px-4 border-b dark:border-gray-700 dark:text-gray-300">
                        @if ($client->premium)
                            <x-premium-badge />
                        @endif
                    </td>
                    <td class="py-2 px-4 border-b dark:border-gray-700">
                        <a href="{{ route('clients.show', $client) }}" class="text-blue-500 dark:text-blue-300">Show</a>
                        <a href="{{ route('clients.edit', $client) }}"
                            class="text-yellow-500 dark:text-yellow-300 ml-2">Edit</a>
                        <form action="{{ route('clients.destroy', $client) }}" method="POST" class="inline"
                            onsubmit="return confirm('Are you sure you want to delete this client?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 dark:text-red-300 ml-2">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-4 dark:text-gray-300">
        {{ $clients->links() }}
    </div>
</x-layout>
