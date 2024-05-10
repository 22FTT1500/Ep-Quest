<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="bg-cover bg-repeat bg-center text-white font-sans" style="background-image: url('./assets/background.png');">
        <div class="flex flex-col h-screen text-black">

            <div class="flex justify-between items-center py-8 px-4 bg-sky-400 rounded-br-[30px] rounded-bl-[30px] border-2 border-black">

                <a href="settingpage.php"><img src="./assets/left-arrow.png" alt="back" class="rounded-full ml-3 size-7" /></a>

                <h1 class="text-xl font-bold text-white">Ep Records</h1>

                <a href="notificationpage.php"><img src="./assets/bell.png" alt="bell" class="rounded-full ml-3 size-7" /></a>

            </div>

            <div class="flex flex-col gap-4 py-6 px-4">
                <div class="bg-white p-6 rounded-[30px] shadow-lg mb-4 border-2 border-black">
                    <div class="flex justify-center mb-4" style="border-bottom: 2px solid black;">
                        <img src="https://placehold.co/300x150" alt="Handball Image" style="object-fit: cover; width: 100%; height: 100%;">
                    </div>
                    <div class="flex flex-col gap-2 text-lg">
                        <p class="font-bold flex justify-between" style="border-bottom: 1px solid black;">Club: <span class="font-normal text-right">Handball</span></p>
                        <p class="font-bold flex justify-between" style="border-bottom: 1px solid black;">Attendance: <span class="font-normal text-right">Attend ✔</span></p>
                        <p class="font-bold flex justify-between" style="border-bottom: 1px solid black;">Sign In: <span class="font-normal text-right">9:50 AM</span></p>
                        <p class="font-bold flex justify-between" style="border-bottom: 1px solid black;">Date: <span class="font-normal text-right">26 Oct 2023</span></p>
                        <p class="font-bold flex justify-between">Ep Gained: <span class="font-normal text-right">+4</span></p>
                    </div>
                </div>

                <div class="bg-white p-4 rounded-[30px] shadow-lg mb-4 border-2 border-black">
                    <div class="flex justify-center mb-4" style="border-bottom: 2px solid black;">
                        <img src="https://placehold.co/300x150" alt="Esport Event Image" style="object-fit: cover; width: 100%; height: 100%;">
                    </div>
                    <div class="flex flex-col gap-2 text-lg">
                        <p class="font-bold flex justify-between" style="border-bottom: 1px solid black;">Event: <span class="font-normal text-right">Esport Event</span></p>
                        <p class="font-bold flex justify-between" style="border-bottom: 1px solid black;">Attendance: <span class="font-normal text-right">Attend ✔</span></p>
                        <p class="font-bold flex justify-between" style="border-bottom: 1px solid black;">Sign In: <span class="font-normal text-right">9:50 AM</span></p>
                        <p class="font-bold flex justify-between" style="border-bottom: 1px solid black;">Date: <span class="font-normal text-right">26 Oct 2023</span></p>
                        <p class="font-bold flex justify-between">Ep Gained: <span class="font-normal text-right">+5</span></p>
                    </div>
                </div>
            </div>

        </div>

        <br>
        <br>
        <br>
        <br>
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