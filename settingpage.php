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

    <body class="bg-zinc-200 text-white font-sans">
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

            <h2 class="text-center text-2xl font-bold mb-4 mt-4 text-black">Settings</h2>
            <!-- Manage profile card button -->
            <div class="mx-4 my-2 p-4 bg-blue-600 rounded-lg text-center">
                <a href="manageprofile.php"><button class="">Manage Profile</button></a>
            </div>

            <div class="mx-4 my-2 p-4 bg-blue-600 rounded-lg text-center">
                <a href=""><button class="">Ep Records</button></a>
            </div>

            <div class="mx-4 my-2 p-4 bg-blue-600 rounded-lg text-center">
                <a href="manageclubpage.php"><button class="">Manage Club</button></a>
            </div>

            <div class="mx-4 my-2 p-4 bg-blue-600 rounded-lg text-center">
                <a href="feedbackpage.php"><button class="">Feedback</button></a>
            </div>

            <div class="mx-4 my-2 p-4 bg-blue-600 rounded-lg text-center">
                <a href="aboutpage.php"><button class="">About us</button></a>
            </div>

            <div class="mx-4 my-2 p-4 bg-blue-600 rounded-lg text-center">
                <a href="logout.php"><button class="text-red-600">Logout</button></a>
            </div>

            <div class="p-4 bg-blue-900 fixed bottom-0 w-full">
                <div class="flex justify-around text-zinc-200">
                    <span><a href="studentpage.php">Home</a></span>
                    <span><a href="activitypage.php">Activity</a></span>
                    <span><a href="leaderboard.php">Scores</a></span>
                    <span><a href="#">Settings</a></span>
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