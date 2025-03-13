<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authenticatie en Authorisatie</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">

    <div class="container mx-auto mt-8">
        {{ $slot }}
    </div>

    <footer class="container mx-auto mt-8 flex justify-between gap-4 pt-4 border-t border-gray-100 dark:border-gray-800">
        <p class="text-gray-600 dark:text-gray-500">
            &copy; {{ date('Y') }} Your Company. All rights reserved.
        </p>
        @auth
        <div class="flex gap-4 items-baseline">
            <p class="text-gray-600 dark:text-gray-500">Logged in as <span class="text-gray-700 dark:text-gray-300">{{ Auth::user()->name }}</span></p>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-blue-500 dark:text-blue-300 hover:underline">Logout</button>
            </form>
        </div>
        @endauth
    </footer>
</body>

</html>
