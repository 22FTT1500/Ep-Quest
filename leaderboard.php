<?php
session_start();
include 'db_conn.php';

if (isset($_SESSION['student_id']) && isset($_SESSION['fullname']) && isset($_SESSION['profileimg']) && isset($_SESSION['total_ep_points'])) {
    // Retrieve user data ordered by EP points
    $sql = "SELECT stid, fullname, student_id, profileimg, total_ep_points FROM student_details WHERE is_admin = 0 ORDER BY total_ep_points DESC";


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

    <body class="bg-zinc-100 text-white font-sans">
        <div class="flex flex-col h-screen">
            <div class="p-4 bg-blue-900">
                <!-- Profile Link -->
                <div class="flex items-center">
                    <img src="<?php echo $_SESSION['profileimg']; ?>" alt="profile" class="rounded-full ml-3 size-10" />
                    <div class="ml-3">
                        <h1 class="font-bold"><?php echo $_SESSION['fullname']; ?></h1>
                        <p class="text-sm">22ft1414@student.pb.edu.bn</p>
                    </div>
                    <div class="ml-auto">
                        <a href="notificationpage.php"><img src="./assets/bell.png" alt="profile" class="rounded-full ml-3 size-7" /></a>
                    </div>
                </div>
            </div>

            <h2 class="text-center text-2xl font-bold mb-4">Leaderboard</h2>
            <div class="mx-4 my-2">
                <?php
                // Loop through the result set and display each user
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="flex items-center justify-between bg-orange-100 p-4 rounded-lg my-2">
                        <div class="flex items-center">
                            <span class="text-lg font-bold mr-2 text-zinc-500"><?php echo $row['stid']; ?></span>
                            <img src="<?php echo $row['profileimg']; ?>" class="rounded-full size-10" crossorigin="anonymous">


                            <div class="ml-2">
                                <p class="font-semibold text-zinc-500"><?php echo $row['fullname']; ?></p>
                                <p class="text-xs text-zinc-500"><?php echo $row['student_id']; ?></p>
                            </div>
                        </div>
                        <span class="font-semibold text-zinc-500"><?php echo $row['total_ep_points']; ?></span>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

        <div class="p-4 bg-blue-900 fixed bottom-0 w-full">
            <div class="flex justify-around text-zinc-200">
                <span><a href="studentpage.php">Home</a></span>
                <span><a href="activitypage.php">Activity</a></span>
                <span><a href="#">Scores</a></span>
                <span><a href="settingpage.php">Settings</a></span>
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