<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body class="bg-white text-black font-sans">
    <div class="max-w-screen-lg mx-auto">
        <div class="py-6 px-4 bg-sky-400 rounded-br-[30px] rounded-bl-[30px] border-2 border-black">
            <!-- Profile Link -->
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <a href="studentpage.php"><img src="./assets/left-arrow.png" alt="profile" class="rounded-full ml-3 size-7" /></a>
                    <!-- add center title -->
                </div>
                <div class="justify-self-center ml-3 text-white">
                    <h1 class="font-bold text-xl">Club</h1>
                </div>
                <div>
                    <a href="notificationpage.php">
                        <img src="./assets/bell.png" alt="profile" class="rounded-full ml-3 size-7" />
                    </a>
                </div>
            </div>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4 text-black">
            <div class="flex items-center justify-center">
                <img src="https://placehold.co/300x150" alt="Handball Game" class="rounded-xl mb-4 w-full h-full object-cover">
            </div>
            <div>
                <h2 class="text-lg font-semibold mb-2">Description</h2>
                <p class="text-sm text-justify">
                    Handball is a team sport in which two teams of seven players each pass a ball using their hands with the aim of throwing it into the goal of the opposing team. A standard match consists of two periods of 30 minutes, and the team that scores more goals wins.
                </p>
            </div>
            <div>
                <h2 class="text-lg font-semibold mb-2">Club Managers</h2>
                <p class="text-sm text-justify">
                    Awang Haji Luffy<br>
                    Steven fantechn<br>
                    Andrew
                </p>
            </div>
            <div>
                <h2 class="text-lg font-semibold mb-2">Sessions</h2>
                <p class="text-sm text-justify">
                    Berakas Sports Complex every Saturday on 2:30 PM
                </p>
            </div>
            <div>
                <h2 class="text-lg font-semibold mb-2">Club offers 3K Event!!</h2>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 p-4">
            <button class="bg-zinc-700 text-white border-2 border-black px-4 py-2 rounded-[10px] mb-2 md:mb-0">Joined</button>
            <button class="bg-sky-900 border-2 border-black text-white px-4 py-2 rounded-[10px] mb-2 md:mb-0">Session</button>
        </div>

        <br>
        <br>

        <div class="p-4 bg-sky-400 fixed bottom-0 w-full font-bold text-lg rounded-tr-[20px] rounded-tl-[20px] border-2 border-black text-white">
            <div class="flex justify-around items-center">
                <a href="studentpage.php" class="flex flex-col items-center">
                    <img src="./assets/homeButton.png" alt="home" class="rounded-full size-8">
                    <span>Home</span>
                </a>
                <a href="activitypage.php" class="flex flex-col items-center">
                    <img src="./assets/activityButton.png" alt="activities" class="rounded-full size-8">
                    <span>Activity</span>
                </a>
                <a href="leaderboard.php" class="flex flex-col items-center">
                    <img src="./assets/scoreButton.png" alt="scores" class="rounded-full size-8">
                    <span>Scores</span>
                </a>
                <a href="settingpage.php" class="flex flex-col items-center">
                    <img src="./assets/settingsButton.png" alt="settings" class="rounded-full size-8">
                    <span>Settings</span>
                </a>
            </div>
        </div>
</body>


</html>