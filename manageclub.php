<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Manage Club</title>
</head>

<body class="bg-zinc-900 text-white font-sans">
    <div class="flex flex-col h-screen">
        <div class="p-4 bg-blue-900">
            <!-- Profile Link -->
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <a href="settingpage.php"><img src="./assets/left-arrow.png" alt="profile" class="rounded-full ml-3 size-7" /></a>
                    <!-- add center title -->
                </div>
                <div class="justify-self-center ml-3">
                    <h1 class="font-bold">Manage Club</h1>
                </div>
                <div>
                    <img src="./assets/bell.png" alt="profile" class="rounded-full ml-3 size-7" />
                </div>
            </div>
        </div>

        <div class="flex flex-col items-center mt-8">
            <h2 class="text-2xl font-bold mb-4">List of Clubs</h2>
            <div class="grid grid-rows-3 gap-4">
                <div class="bg-white rounded-lg p-4">
                    <img src="club1.jpg" alt="Club 1" class="w-32 h-32 mb-2">
                    <h3 class="text-lg font-bold">Club 1</h3>
                    <p class="text-gray-500">Position: President</p>
                    <p class="text-gray-500">Status: Active</p>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">View Club</button>
                </div>
                <div class="bg-white rounded-lg p-4">
                    <img src="club2.jpg" alt="Club 2" class="w-32 h-32 mb-2">
                    <h3 class="text-lg font-bold">Club 2</h3>
                    <p class="text-gray-500">Position: Vice President</p>
                    <p class="text-gray-500">Status: Active</p>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">View Club</button>
                </div>
                <div class="bg-white rounded-lg p-4">
                    <img src="club3.jpg" alt="Club 3" class="w-32 h-32 mb-2">
                    <h3 class="text-lg font-bold">Club 3</h3>
                    <p class="text-gray-500">Position: Treasurer</p>
                    <p class="text-gray-500">Status: Inactive</p>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">View Club</button>
                </div>
            </div>
        </div>


        <div class="p-4 bg-blue-900 fixed bottom-0 w-full">
            <div class="flex justify-around text-zinc-200">
                <span><a href="studentpage.php">Home</a></span>
                <span><a href="#">Activity</a></span>
                <span><a href="leaderboard.php">Scores</a></span>
                <span><a href="settingpage.php">Settings</a></span>
            </div>
        </div>
    </div>
</body>

</html>

<?php

?>