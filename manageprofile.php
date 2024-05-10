<?php
session_start();
include 'db_conn.php';

if (
    isset($_SESSION['student_id']) && isset($_SESSION['fullname'])
    && isset($_SESSION['email']) && isset($_SESSION['grpcode'])
    && isset($_SESSION['contactno']) && isset($_SESSION['course']) && isset($_SESSION['profileimg']) && isset($_SESSION['point'])
) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Student Profile</title>
    </head>

    <body class="bg-cover bg-repeat bg-center text-black font-sans" style="background-image: url('./assets/background.png');">
        <div class="flex flex-col h-screen">
            <div class="py-8 px-4 bg-sky-400 rounded-br-[15px] rounded-bl-[15px] border-2 border-black">
                <!-- Profile Link -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <a href="activitypage.php"><img src="./assets/left-arrow.png" alt="profile" class="rounded-full ml-3 size-7" /></a>
                        <!-- add center title -->
                    </div>
                    <div class="justify-self-center ml-3">
                        <h1 class="font-bold text-xl text-white">Manage Profile</h1>
                    </div>
                    <div>
                        <img src="./assets/bell.png" alt="bell" class="rounded-full ml-3 size-7" />
                    </div>
                </div>
            </div>

            <!-- Profile -->
            <div class="flex items-center">
                <div class="p-6 flex flex-col items-left">
                    <div class="mb-2 size-32">
                        <img src="<?php echo $_SESSION['profileimg']; ?>" alt="profile" class="rounded-full" />
                    </div>
                    <button class=" items-center border-2 border-black rounded-full bg-white py-1 w-32 text-center">Edit Profile</button>
                </div>

                <div class="border-2 border-black bg-white p-4 rounded-[20px] text-left flex items-center ml-4 mr-5">
                    <div>
                        <p class="text-base font-normal">Total Ep Points</p>
                        <span class="text-5xl font-bold"><?php echo $_SESSION['point']; ?></span>
                    </div>
                    <img src="./assets/token.png" alt="token" class="rounded-full size-20 ml-auto">
                </div>
            </div>

            <div class="px-4">
                <div class="border-2 border-black bg-white rounded-[20px] flex flex-col items-left py-6 px-4">

                    <p class="text-lg font-bold">
                        <span class="pl-2">Student ID</span>
                        <br>
                        <span class="border-2 border-zinc-400 rounded-full px-4 block w-full mb-2 font-normal"><?php echo $_SESSION['student_id']; ?></span>
                    </p>

                    <p class="text-lg font-bold">
                        <span class="pl-2">Full Name</span>
                        <br>
                        <span class="border-2 border-zinc-400 rounded-full px-4 block w-full mb-2 font-normal"><?php echo $_SESSION['fullname']; ?></span>
                    </p>

                    <p class="text-lg font-bold">
                        <span class="pl-2">Student Email</span>
                        <br>
                        <span class="border-2 border-zinc-400 rounded-full px-4 block w-full mb-2 font-normal"><?php echo $_SESSION['email']; ?></span>
                    </p>

                    <p class="text-lg font-bold">
                        <span class="pl-2">Group Code</span>
                        <br>
                        <span class="border-2 border-zinc-400 rounded-full px-4 block w-full mb-2 font-normal"><?php echo $_SESSION['grpcode']; ?></span>
                    </p>

                    <p class="text-lg font-bold">
                        <span class="pl-2">Contact No</span>
                        <br>
                        <span class="border-2 border-zinc-400 rounded-full px-4 block w-full mb-2 font-normal"><?php echo $_SESSION['contactno']; ?></span>
                    </p>

                    <p class="text-lg font-bold">
                        <span class="pl-2">Course</span>
                        <br>
                        <span class="border-2 border-zinc-400 rounded-full px-4 block w-full mb-2 font-normal"><?php echo $_SESSION['course']; ?></span>
                    </p>

                </div>
            </div>

            <div class="p-4 bg-sky-400 fixed bottom-0 w-full font-bold text-lg rounded-tr-[20px] rounded-tl-[20px] border-2 border-black">
                <div class="flex justify-around text-zinc-200">
                    <span><a href="studentpage.php">Home</a></span>
                    <span><a href="activitypage.php">Activity</a></span>
                    <span><a href="leaderboard.php">Scores</a></span>
                    <span><a href="settingpage.php">Settings</a></span>
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