<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css" rel="stylesheet">
    <title>EP-QUEST</title>
</head>

<body>

    <div class="flex items-center justify-center h-screen bg-zinc-100 dark:bg-zinc-800">
        <div class="p-4 rounded-lg w-full max-w-sm">
            <div class="flex flex-col items-center">
                <div class="bg-black dark:bg-white rounded-full p-2">
                    <img src="https://placehold.co/80x80" alt="logo" class="rounded-full" crossorigin="anonymous">
                </div>
                <h2 class="text-xl font-semibold my-2">Ep-Quest</h2>
            </div>
            <form class="space-y-4 mt-4">
                <div class="flex items-center bg-white dark:bg-zinc-700 border-2 border-zinc-200 dark:border-zinc-600 rounded-full px-4 py-2">
                    <i class="fas fa-user text-zinc-400 dark:text-zinc-300"></i>
                    <input type="text" placeholder="Student ID" class="bg-transparent dark:text-white dark:placeholder-zinc-400 flex-1 outline-none ml-2">
                </div>
                <div class="flex items-center bg-white dark:bg-zinc-700 border-2 border-zinc-200 dark:border-zinc-600 rounded-full px-4 py-2">
                    <i class="fas fa-lock text-zinc-400 dark:text-zinc-300"></i>
                    <input type="password" placeholder="Password" class="bg-transparent dark:text-white dark:placeholder-zinc-400 flex-1 outline-none ml-2">
                </div>
                <button type="submit" class="w-full bg-blue-900 text-white py-2 rounded-full flex items-center justify-center">
                    Sign In <i class="fas fa-arrow-right ml-2"></i>
                </button>
            </form>
        </div>
    </div>


</body>

</html>