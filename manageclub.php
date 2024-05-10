<?php
session_start();
include 'db_conn.php';

// Check if the student is logged in
if (isset($_SESSION['student_id'])) {
    // Retrieve the student's ID
    $student_id = $_SESSION['student_id'];

    // Fetch the clubs joined by the student from the student_cca table along with the club names and banners
    $sql = "SELECT ccca.cca_name, ccca.joining_date, std.fullname, clb.ImgBanner 
            FROM student_cca AS ccca 
            INNER JOIN student_details AS std ON ccca.student_id = std.student_id 
            INNER JOIN clubs AS clb ON ccca.cca_name = clb.ClubName
            WHERE ccca.student_id = '$student_id'";
    $result = mysqli_query($conn, $sql);
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Manage Club</title>
    </head>

    <body class="bg-cover bg-repeat bg-center text-white font-sans" style="background-image: url('./assets/background.png');">
        <div class="flex flex-col h-screen">
            <div class="py-6 px-4 bg-sky-400 rounded-br-[30px] rounded-bl-[30px] border-2 border-black">

                <div class="flex items-center justify-between ">
                    <div class="flex items-center">
                        <a href="settingpage.php"><img src="./assets/left-arrow.png" alt="profile" class="rounded-full ml-3 size-7" /></a>

                    </div>
                    <div class="justify-self-center ml-3">
                        <h1 class="font-bold text-xl">Manage Clubs</h1>
                    </div>
                    <div>
                        <a href="notificationpage.php"><img src="./assets/bell.png" alt="bell" class="rounded-full ml-3 size-7" /></a>
                    </div>
                </div>
            </div>

            <div class="flex flex-col items-center mt-4">
                <h2 class="text-2xl text-black font-bold mb-4 bg-white">List of Clubs</h2>
                <div class="grid grid-rows-3 gap-4">
                    <?php
                    // Loop through the fetched clubs and display them
                    while ($row = mysqli_fetch_assoc($result)) {
                        $cca_name = $row['cca_name'];
                        $joining_date = $row['joining_date'];
                        $fullname = $row['fullname'];
                        $img_banner = $row['ImgBanner'];
                    ?>
                        <div class="bg-white py-4 border-2 border-black rounded-lg relative">
                            <div class="flex items-center px-8 pb-8">
                                <!-- Display the club banner -->
                                <div class="flex items-center"> <!-- Added flex-grow -->
                                    <img src="<?php echo $img_banner; ?>" alt="<?php echo $cca_name; ?>" class="size-20 object-cover border-2 border-black rounded-lg">
                                    <div class="ml-4">
                                        <h3 class="text-gray-500 font-bold"><?php echo $cca_name; ?></h3>
                                        <p class="text-gray-500">Joined by: <?php echo $fullname; ?></p>
                                        <p class="text-gray-500">Date Joined: <?php echo $joining_date; ?></p>
                                        <!-- You can add more details about the club here -->
                                    </div>
                                </div>
                            </div>

                            <!-- Position "View Club" link at bottom right -->
                            <a href="#" class="absolute bottom-4 right-4 text-black font-bold inline-flex items-center"> <!-- clubpage.php requires respective clubID -->
                                View Club
                                <img src="./assets/right-arrow.png" alt="view" class="size-7 ml-1">
                            </a>
                        </div>

                    <?php
                    }
                    ?>
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
        </div>
    </body>

    </html>

<?php
} else {
    // Redirect to the login page if the student is not logged in
    header("Location: index.php");
    exit();
}
?>