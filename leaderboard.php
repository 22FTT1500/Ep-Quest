<?php
session_start();
include 'db_conn.php';

if (isset($_SESSION['student_id']) && isset($_SESSION['fullname']) && isset($_SESSION['profileimg']) && isset($_SESSION['total_ep_points'])) {
    // Retrieve user data ordered by EP points
    $sql = "SELECT stid, fullname, student_id, profileimg, total_ep_points FROM student_details ORDER BY total_ep_points DESC";

    $result = mysqli_query($conn, $sql);

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Leaderboard</title>
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

            <h2 class="text-center text-2xl font-bold text-black my-4 mx-2 bg-white block inline">Leaderboard</h2>

            <div class="m-4">
                <?php
                // Loop through the result set and display each user
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="mb-4">
                        <div class="flex items-center justify-between bg-zinc-200 px-4 py-4 rounded-[30px] my-2 shadow-lg">
                            <div class="flex items-center">

                                <span class="text-xl font-bold mr-2 text-zinc-500"><?php echo $row['stid']; ?></span>

                                <img src="<?php echo $row['profileimg']; ?>" class="rounded-full size-12" crossorigin="anonymous">

                                <div class="ml-2">
                                    <p class="font-bold text-lg text-zinc-500"><?php echo $row['fullname']; ?></p>
                                    <p class="text-lg text-zinc-500"><?php echo $row['student_id']; ?></p>
                                </div>

                            </div>
                            <span class="font-bold text-xl text-zinc-500"><?php echo $row['total_ep_points']; ?></span>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>

        </div>

        <!-- Footer -->
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
                    <img src="./assets/scoreSelectedButton.png" alt="scores" class="rounded-full size-8">
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

<?php
} else {
    header("Location: index.php");
    exit();
}
?>