<?php
session_start();
include 'db_conn.php';
if (isset($_SESSION['student_id']) && isset($_SESSION['student_id'])) {
?>

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
            <div class="p-4 bg-blue-900">
                <!-- Profile Link -->
                <div class="flex items-center">
                    <img src="https://placehold.co/40x40" alt="profile" class="rounded-full ml-3" />
                    <div class="ml-3">
                        <h1 class="font-bold"><?php echo $_SESSION['fullname']; ?></h1>
                        <p class="text-sm">22ft1414@student.pb.edu.bn</p>
                    </div>
                </div>
            </div>

            <h2 class="text-center text-2xl font-bold mb-4">Leaderboard</h2>
            <div class="mx-4 my-2">
                <div class="flex items-center justify-between bg-orange-100 p-4 rounded-lg">
                    <div class="flex items-center">
                        <span class="text-lg font-bold mr-2 text-zinc-500">1</span>
                        <img src="https://placehold.co/40x40" alt="User" class="rounded-full" crossorigin="anonymous">
                        <div class="ml-2">
                            <p class="font-semibold text-zinc-500">Lala</p>
                            <p class="text-xs text-zinc-500">22ftt1414</p>
                        </div>
                    </div>
                    <span class="font-semibold text-zinc-500">530</span>
                </div>
            </div>
        </div>

        <div class="p-4 bg-blue-900 bottom-0 w-full">
            <div class="flex justify-around text-zinc-200">
                <span><a href="studentpage.php">Home</a></span>
                <span><a href="activitypage.php">Activity</a></span>
                <span><a href="#">Scores</a></span>
                <span><a href="">Profile</a></span>
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