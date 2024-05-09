<?php
session_start();
include 'db_conn.php';

if (isset($_SESSION['student_id']) && isset($_SESSION['fullname']) && isset($_SESSION['profileimg'])) {
    // Retrieve all clubs from the database
    $sqlClubs = "SELECT * FROM clubs";
    $resultClubs = mysqli_query($conn, $sqlClubs);

    // Retrieve all events from the database
    $sqlEvents = "SELECT * FROM events";
    $resultEvents = mysqli_query($conn, $sqlEvents);

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Activity Page</title>
    </head>

    <body class="bg-zinc-100 text-white font-sans">
        <div class="flex flex-col">
            <!-- Header -->
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

            <!-- Search box -->
            <div class="mx-4 my-4 rounded-lg text-center">
                <div class="flex items-center space-x-2 p-4 bg-white dark:bg-zinc-800 shadow-md rounded-lg">
                    <input type="text" placeholder="Search Clubs or Events..." class="flex-grow p-2 border border-zinc-300 dark:border-zinc-700 rounded-lg focus:outline-none dark:text-white">
                    <button class="p-2 bg-blue-500 dark:bg-blue-700 text-white dark:text-white rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0zM21 21l-4.35-4.35"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Activity cards for each club -->
            <div class="mx-4 my-5">
                <?php
                // Display clubs
                while ($row = mysqli_fetch_assoc($resultClubs)) {
                ?>
                    <a href="clubpage.php?ClubID=<?php echo $row['ClubID']; ?>" class="block mb-4">
                        <div class="bg-white dark:bg-zinc-800 shadow-lg rounded-lg overflow-hidden">
                            <img src="<?php echo $row['ImgBanner']; ?>" alt="<?php echo $row['ClubName']; ?>" class="w-full h-48 sm:h-64 object-cover">
                            <div class="p-4">
                                <div class="flex justify-between items-center">
                                    <h2 class="text-lg font-semibold dark:text-white"><?php echo $row['ClubName']; ?></h2>
                                    <!-- Add any other club details you want to display -->
                                </div>
                            </div>
                        </div>
                    </a>
                <?php
                }

                // Display events
                while ($row = mysqli_fetch_assoc($resultEvents)) {
                ?>
                    <a href="eventpage.php?EventID=<?php echo $row['EventID']; ?>" class="block mb-7">
                        <div class="bg-white dark:bg-zinc-800 shadow-lg rounded-lg overflow-hidden">
                            <img src="<?php echo $row['ImgBanner']; ?>" alt="<?php echo $row['EventName']; ?>" class="w-full h-48 sm:h-64 object-cover">
                            <div class="p-4">
                                <div class="flex justify-between items-center">
                                    <h2 class="text-lg font-semibold dark:text-white"><?php echo $row['EventName']; ?></h2>
                                    <!-- Add any other event details you want to display -->
                                </div>
                            </div>
                        </div>
                    </a>
                <?php
                }
                ?>
            </div>

            <!-- Footer -->
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