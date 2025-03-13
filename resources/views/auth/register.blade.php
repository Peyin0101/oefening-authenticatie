<x-layout>
    <h1 class="text-2xl font-bold mb-4 dark:text-white">Register</h1>
    <p class="mb-4 text-gray-700 dark:text-gray-300">
        Already have an account?
        <a href="{{ route('login') }}" class="text-blue-500 dark:text-blue-300">Login here</a>
    </p>
    <form novalidate action="{{ route('register.post') }}" method="POST"
        class="bg-white dark:bg-gray-800 max-w-2xl p-6 rounded shadow-md">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-gray-700 dark:text-gray-300">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="w-full p-2 border rounded dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
            @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 dark:text-gray-300">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                class="w-full p-2 border rounded dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
            @error('email')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password" class="block text-gray-700 dark:text-gray-300">Password</label>
            <input type="password" name="password" id="password"
                class="w-full p-2 border rounded dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
            @error('password')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700 dark:text-gray-300">Confirm
                Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                class="w-full p-2 border rounded dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300" required>
        </div>
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded dark:bg-blue-700">Register</button>
    </form>
</x-layout>
