<?php
session_start();
include 'db_conn.php';
if (isset($_SESSION['student_id']) && isset($_SESSION['student_id']) && isset($_SESSION['profileimg']) && isset($_SESSION['total_ep_points'])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Home Page</title>
    </head>

    <body class="bg-cover bg-repeat bg-center text-black font-sans" style="background-image: url('./assets/background.png');">
        <div class="flex flex-col">
            <!-- Header -->
            <div class="py-8 px-4 bg-sky-400 rounded-br-[30px] rounded-bl-[30px] border-2 border-black text-white">
                <div class="flex items-center">
                    <div>
                        <a href="manageprofile.php">
                            <img src="<?php echo $_SESSION['profileimg']; ?>" alt="profile" class="rounded-full ml-3 size-16" />
                        </a>
                    </div>
                    <div class="ml-3">
                        <h1 class="font-bold"><?php echo $_SESSION['fullname']; ?></h1>
                        <p class="text-base">22ft1414@student.pb.edu.bn</p>
                    </div>
                    <div class="ml-auto">
                        <a href="notificationpage.php"><img src="./assets/bell.png" alt="profile" class="rounded-full ml-3 size-7" /></a>
                    </div>
                </div>
            </div>

            <div class="bg-sky-900 mx-4 my-4 py-2 px-4 rounded-[30px] text-white flex items-center justify-between">
                <!-- Text and button container -->
                <div class="pl-4">
                    <!-- Text -->
                    <span class="text-5xl font-bold shadow-lg"><?php echo $_SESSION['total_ep_points']; ?> EP</span>
                    <!-- Button -->
                    <div class="mt-2">
                        <a href="activitypage.php">
                            <button class="bg-slate-300 hover:bg-sky-500 text-black px-4 py-1 rounded-full shadow-lg">Get More EP</button>
                        </a>
                    </div>
                </div>
                <!-- Image container -->
                <div>
                    <!-- Image -->
                    <img src="./assets/studentpageEP.png" alt="EP box" class="size-44">
                </div>
            </div>

            <div class="mx-4 my-2">
                <div class="flex justify-between items-center mb-2">
                    <h2 class="text-3xl font-bold text-black bg-white">Events</h2>
                    <a href="activitypage.php"><button class="text-sky-600 bg-white pr-2">View More</button></a>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <img src="./assets/EsportEvent.jpg" alt="Event 1" class="rounded-[30px] bg-cover h-48 w-64 shadow-lg" />
                    <img src="./assets/GoldenEvent.jpg" alt="Event 2" class="rounded-[30px] bg-cover h-48 w-64 shadow-lg" />
                </div>
            </div>

            <div class="mx-4 my-6 mb-4">
                <div class="flex justify-between items-center mb-2">
                    <h2 class="text-3xl font-bold text-black bg-white">Clubs</h2>
                    <a href="activitypage.php"><button class=" text-sky-600 bg-white pr-2">View More</button></a>
                </div>
                <div>
                    <img src="./assets/handball.jpg" alt="Club Photo" class="rounded-[30px] shadow-lg" />
                </div>
            </div>

            <br>
            <br>
            <br>
            <br>

            <!-- Footer -->
            <div class="p-4 bg-sky-400 fixed bottom-0 w-full font-bold text-lg rounded-tr-[20px] rounded-tl-[20px] border-2 border-black text-white">
                <div class="flex justify-around items-center">
                    <a href="studentpage.php" class="flex flex-col items-center">
                        <img src="./assets/homeSelectedButton.png" alt="home" class="rounded-full size-8">
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

        </div>
    </body>


    </html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>