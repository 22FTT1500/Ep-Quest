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
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Student Profile</title>
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
                        <h1 class="font-bold">Manage Profile</h1>
                    </div>
                    <div>
                        <img src="./assets/bell.png" alt="profile" class="rounded-full ml-3 size-7" />
                    </div>
                </div>
            </div>

            <!-- Profile -->
            <div class="flex justify-center items-center mb-2">
                <img src="<?php echo $_SESSION['profileimg']; ?>" alt="profile" class="rounded-full" />
            </div>


            <p class="text-lg font-bold">Student ID: <?php echo $_SESSION['student_id']; ?></p>
            <p class="text-lg font-bold">Full Name: <?php echo $_SESSION['fullname']; ?></p>
            <p class="text-lg font-bold">Student Email: <?php echo $_SESSION['email']; ?></p>
            <p class="text-lg font-bold">Group Code: <?php echo $_SESSION['grpcode']; ?></p>
            <p class="text-lg font-bold">Contact No: <?php echo $_SESSION['contactno']; ?></p>
            <p class="text-lg font-bold">Course: <?php echo $_SESSION['course']; ?></p>

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
} else {
    header("Location: index.php");
    exit();
}
?>