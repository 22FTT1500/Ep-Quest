<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body class="bg-zinc-900 text-white font-sans">
    <div class="max-w-3xl mx-auto">

        <div class="flex items-center space-x-2 p-4 bg-white dark:bg-zinc-800 shadow-md rounded-lg">
            <input type="text" placeholder="Search Clubs or Events..." class="flex-grow p-2 border border-zinc-300 dark:border-zinc-700 rounded-lg focus:outline-none dark:text-white">
            <button class="p-2 bg-blue-500 dark:bg-blue-700 text-white dark:text-white rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0zM21 21l-4.35-4.35"></path>
                </svg>
            </button>
        </div>

        <div class="mt-4 space-y-4">

            <div class="bg-white dark:bg-zinc-800 shadow-lg rounded-lg overflow-hidden">
                <img src="https://placehold.co/600x300" alt="Handball Club" class="w-full h-48 sm:h-64 object-cover">
                <div class="p-4">
                    <div class="flex justify-between items-center">
                        <h2 class="text-lg font-semibold dark:text-white">Handball Club</h2>
                        <span class="bg-green-500 text-white dark:text-white py-1 px-3 rounded-full text-xs">3K</span>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-zinc-800 shadow-lg rounded-lg overflow-hidden">
                <img src="https://placehold.co/600x300" alt="Esport Convo Event" class="w-full h-48 sm:h-64 object-cover">
                <div class="p-4">
                    <h2 class="text-lg font-semibold dark:text-white">Esport Convo Event</h2>
                    <p class="text-sm text-zinc-600 dark:text-zinc-400">13-15 Oct 2023</p>
                </div>
            </div>
        </div>
    </div>
</body>


</html>