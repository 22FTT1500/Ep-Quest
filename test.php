<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body class="bg-zinc-900 text-white font-sans">
    <div class="flex flex-col h-screen">
        <div class="p-4 bg-black">
            <div class="flex justify-between items-center">
                <img src="https://placehold.co/40x40" alt="Logo" class="rounded-full" />
                <button class="p-2 rounded-md bg-zinc-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6 text-white">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Profile Link -->
        <div class="flex items-center">
            <img src="https://placehold.co/40x40" alt="profile" class="rounded-full ml-3" />
            <div class="ml-3">
                <h1 class="font-bold"><?php echo $_SESSION['fullname']; ?></h1>
                <p class="text-sm">22ft1414@student.pb.edu.bn</p>
            </div>
        </div>

        <div class="bg-blue-600 mx-4 my-4 p-4 rounded-lg text-center">
            <div class="flex justify-center items-center mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                <span class="text-3xl font-bold">140 EP</span>
            </div>
            <button class="bg-blue-800 text-white px-4 py-2 rounded-md">Get More Ep</button>
        </div>

        <div class="mx-4 my-2">
            <div class="flex justify-between items-center mb-2">
                <h2 class="text-xl font-bold">Events</h2>
                <button class="text-blue-300">View More</button>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <img src="https://placehold.co/500x150" alt="Event 1" class="rounded-lg" />
                <img src="https://placehold.co/500x150" alt="Event 2" class="rounded-lg" />
            </div>
        </div>

        <div class="mx-4 my-2 mb-4">
            <div class="flex justify-between items-center mb-2">
                <h2 class="text-xl font-bold">Clubs</h2>
                <button class="text-blue-300">View More</button>
            </div>
            <img src="https://placehold.co/300x150" alt="Club Photo" class="rounded-lg" />
        </div>

        <div class="mt-auto bg-black p-2">
            <div class="flex justify-around text-zinc-400">
                <span>Home</span>
                <span>Activity</span>
                <span>Scores</span>
                <span>Profile</span>
            </div>
        </div>
    </div>
</body>


</html>