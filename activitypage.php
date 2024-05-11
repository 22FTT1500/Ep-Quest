<?php
session_start();
include 'db_conn.php';

if (isset($_SESSION['student_id']) && isset($_SESSION['fullname']) && isset($_SESSION['profileimg']) && isset($_SESSION['email'])) {
    // Retrieve all clubs from the database
    $sqlClubs = "SELECT * FROM clubs";
    $resultClubs = mysqli_query($conn, $sqlClubs);

    // Retrieve all events from the database
    $sqlEvents = "SELECT * FROM events";
    $resultEvents = mysqli_query($conn, $sqlEvents);

    // Process search query
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $sqlSearchClubs = "SELECT * FROM clubs WHERE ClubName LIKE '%$search%'";
        $sqlSearchEvents = "SELECT * FROM events WHERE EventName LIKE '%$search%'";

        // Execute queries for clubs and events
        $resultClubs = mysqli_query($conn, $sqlSearchClubs);
        $resultEvents = mysqli_query($conn, $sqlSearchEvents);
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Activity Page</title>
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
                        <p class="text-base"><?php echo $_SESSION['email']; ?></p>
                    </div>
                    <div class="ml-auto">
                        <a href="notificationpage.php"><img src="./assets/bell.png" alt="profile" class="rounded-full ml-3 size-7" /></a>
                    </div>
                </div>
            </div>

            <!-- Search box -->
            <div class="m-4 rounded-full text-center">
                <form method="GET" action="" class="flex items-center p-2 bg-sky-900 shadow-md rounded-full">
                    <input type="text" name="search" placeholder="Search Clubs or Events..." class="flex-grow p-2 pl-4 border border-zinc-300 rounded-full">
                    <button type="submit" class="p-2 bg-sky-900 text-white rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0zM21 21l-4.35-4.35"></path>
                        </svg>
                    </button>
                </form>
            </div>


            <!-- Activity cards for each club -->
            <div class="mx-4 my-5">
                <?php
                // Display clubs
                if (isset($resultClubs)) {
                    while ($row = mysqli_fetch_assoc($resultClubs)) {
                ?>
                        <a href="clubpage.php?ClubID=<?php echo $row['ClubID']; ?>" class="block mb-4">
                            <div class="bg-white dark:bg-zinc-800 shadow-lg rounded-[30px] overflow-hidden">
                                <img src="<?php echo $row['ImgBanner']; ?>" alt="<?php echo $row['ClubName']; ?>" class="w-full h-48 sm:h-64 object-cover">
                                <div class="p-4">
                                    <div class="flex justify-center items-center">
                                        <h2 class="text-lg font-semibold dark:text-white"><?php echo $row['ClubName']; ?></h2>
                                        <!-- Add any other club details you want to display -->
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php
                    }
                }

                // Display events
                if (isset($resultEvents)) {
                    while ($row = mysqli_fetch_assoc($resultEvents)) {
                    ?>
                        <a href="eventpage.php?EventID=<?php echo $row['EventID']; ?>" class="block mb-7">
                            <div class="bg-white dark:bg-zinc-800 shadow-lg rounded-[30px] overflow-hidden">
                                <img src="<?php echo $row['ImgBanner']; ?>" alt="<?php echo $row['EventName']; ?>" class="w-full h-48 sm:h-64 object-cover">
                                <div class="p-4">
                                    <div class="flex justify-center items-center">
                                        <h2 class="text-lg font-semibold dark:text-white"><?php echo $row['EventName']; ?></h2>
                                        <!-- Add any other event details you want to display -->
                                    </div>
                                </div>
                            </div>
                        </a>
                <?php
                    }
                }
                ?>
            </div>

            <br>
            <br>

            <!-- Footer -->
            <div class="p-4 bg-sky-400 fixed bottom-0 w-full font-bold text-lg rounded-tr-[20px] rounded-tl-[20px] border-2 border-black text-white">
                <div class="flex justify-around items-center">
                    <a href="studentpage.php" class="flex flex-col items-center">
                        <img src="./assets/homeButton.png" alt="home" class="rounded-full size-8">
                        <span>Home</span>
                    </a>
                    <a href="activitypage.php" class="flex flex-col items-center">
                        <img src="./assets/activitySelectedButton.png" alt="activities" class="rounded-full size-8">
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