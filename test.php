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
        <div class="py-6 px-4 bg-sky-400 rounded-br-[15px] rounded-bl-[15px] border-2 border-black">
            <!-- Profile Link -->
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <a href="activitypage.php"><img src="./assets/left-arrow.png" alt="profile" class="rounded-full ml-3 size-7" /></a>
                    <!-- add center title -->
                </div>
                <div class="justify-self-center ml-3 text-white">
                    <h1 class="font-bold text-xl">Club</h1>
                </div>
                <div>
                    <img src="./assets/bell.png" alt="profile" class="rounded-full ml-3 size-7" />
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

        <div class=" bg-sky-400 rounded-tr-[15px] rounded-tl-[15px] border-2 border-black py-6 font-bold fixed bottom-0 left-0 right-0 p-4 text-center">
        </div>
</body>


</html>