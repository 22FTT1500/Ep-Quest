<?php
session_start();
include 'db_conn.php';

if (
    isset($_SESSION['student_id']) && isset($_SESSION['fullname'])
    && isset($_SESSION['email']) && isset($_SESSION['grpcode'])
    && isset($_SESSION['contactno']) && isset($_SESSION['course']) && isset($_SESSION['profileimg'])
) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body class="bg-zinc-100 text-white font-sans">
        <div class="flex flex-col h-screen">

            <div class="p-4 bg-blue-900">
                <!-- Profile Link -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <a href="settingpage.php"><img src="./assets/left-arrow.png" alt="profile" class="rounded-full ml-3 size-7" /></a>
                        <!-- add center title -->
                    </div>
                    <div class="justify-self-center ml-3">
                        <h1 class="font-bold">Notification</h1>
                    </div>
                    <div>
                        <img src="./assets/bell.png" alt="profile" class="rounded-full ml-3 size-7" />
                    </div>
                </div>
            </div>


            <div class="mt-4 space-y-2">
                <div class="bg-white dark:bg-zinc-900 p-4 shadow rounded-lg">
                    <h2 class="text-lg font-bold text-zinc-900 dark:text-white">Join Movie Club Now 🍿</h2>
                    <p class="text-zinc-500 dark:text-zinc-400">14/02/2024 10:30 AM</p>
                </div>
                <div class="bg-white dark:bg-zinc-900 p-4 shadow rounded-lg">
                    <h2 class="text-lg font-bold text-zinc-900 dark:text-white">PUBGM AND VALORANT TOURNAMENT</h2>
                    <p class="text-zinc-500 dark:text-zinc-400">14/02/2024 10:30 AM</p>
                </div>
                <div class="bg-white dark:bg-zinc-900 p-4 shadow rounded-lg">
                    <h2 class="text-lg font-bold text-zinc-900 dark:text-white">HANDBALL CLUB OFFERS 3K HOLY !!!</h2>
                    <p class="text-zinc-500 dark:text-zinc-400">14/02/2024 10:30 AM</p>
                </div>
            </div>
        </div>

        <div class="p-4 bg-blue-900 fixed bottom-0 w-full">
            <div class="flex justify-around text-zinc-200">
            </div>
        </div>
    </body>

    </html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>