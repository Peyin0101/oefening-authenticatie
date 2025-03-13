<x-layout>
    <form novalidate action="/contact" method="POST"
        class="max-w-lg mx-auto p-6 bg-white dark:bg-gray-800 shadow-md rounded">
        @csrf

        @if (session('success'))
            <div
                class="max-w-lg mx-auto p-4 mb-6 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 border border-green-400 rounded">
                Form submitted successfully!
            </div>
        @endif

        <div class="mb-4">
            <label for="name" class="block text-gray-700 dark:text-gray-300">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}"
                class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-300"
                required>
            @error('name')
                <p class="text-red-500 dark:text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="email" class="block text-gray-700 dark:text-gray-300">Email Address</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-300"
                required>
            @error('email')
                <p class="text-red-500 dark:text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="department" class="block text-gray-700 dark:text-gray-300">Company Department</label>
            <select id="department" name="department"
                class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-300"
                required>
                <option {{ !old('department') ? 'selected' : '' }} disabled>Select a department</option>
                <option value="sales" {{ old('department') == 'sales' ? 'selected' : '' }}>Sales</option>
                <option value="support" {{ old('department') == 'support' ? 'selected' : '' }}>Support</option>
                <option value="marketing" {{ old('department') == 'marketing' ? 'selected' : '' }}>Marketing</option>
            </select>
            @error('department')
                <p class="text-red-500 dark:text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="message" class="block text-gray-700 dark:text-gray-300">Message</label>
            <textarea id="message" name="message" rows="4"
                class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-300"
                required>{{ old('message') }}</textarea>
            @error('message')
                <p class="text-red-500 dark:text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="inline-flex items-center">
                <input type="checkbox" name="cookie_policy" class="form-checkbox dark:bg-gray-700 dark:border-gray-600"
                    {{ old('cookie_policy') ? 'checked' : '' }} required>
                <span class="ml-2 text-gray-700 dark:text-gray-300">I accept the cookie policy</span>
            </label>
            @error('cookie_policy')
                <p class="text-red-500 dark:text-red-400 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <button type="submit"
                class="transition-colors w-full bg-blue-500 dark:bg-blue-700 text-white py-2 px-4 rounded-md shadow-sm hover:bg-blue-700 dark:hover:bg-blue-900">Submit</button>
        </div>
    </form>
</x-layout>
