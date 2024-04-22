<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>EP-QUEST</title>
</head>

<body class="bg-zinc-100 min-h-screen flex flex-col items-center justify-center p-4">
    <div class="bg-zinc-100 p-4 rounded-lg w-full max-w-sm">
        <div class="flex flex-col items-center">
            <img src="assets/EpQuestLogo.png" alt="Logo" class="mb-2 size-44">
            <h1 class="text-xl font-bold mb-4">Ep-Quest</h1>
        </div>
        <form class="space-y-6">
            <div class="relative">
                <input type="text" placeholder="Student ID" class="pl-10 pr-4 py-2 w-full border rounded-full text-zinc-900 focus:outline-none focus:border-blue-500">
                <span class="absolute left-3 top-2 text-zinc-500">
                    <!-- <img src="https://placehold.co/20x20" alt="Logo" class="mb-2"> -->
                </span>
            </div>
            <div class="relative">
                <input type="password" placeholder="Password" class="pl-10 pr-4 py-2 w-full border rounded-full text-zinc-900 focus:outline-none focus:border-blue-500">
                <span class="absolute left-3 top-2 text-zinc-500">
                    <!-- <img src="https://placehold.co/20x20" alt="Logo" class="mb-2"> -->
                </span>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="w-40 bg-blue-600 text-white py-2 rounded-full">Sign In</button>
            </div>
        </form>
    </div>
</body>


</html>