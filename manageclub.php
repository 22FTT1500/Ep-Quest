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
                        <h1 class="font-bold">Manage Club</h1>
                    </div>
                    <div>
                        <img src="./assets/bell.png" alt="profile" class="rounded-full ml-3 size-7" />
                    </div>
                </div>
            </div>

            <div class="flex flex-col items-center mt-8">
                <h2 class="text-2xl font-bold mb-4">List of Clubs</h2>
                <div class="grid grid-rows-3 gap-4">
                    <?php
                    // Loop through the fetched clubs and display them
                    while ($row = mysqli_fetch_assoc($result)) {
                        $cca_name = $row['cca_name'];
                        $joining_date = $row['joining_date'];
                        $fullname = $row['fullname'];
                        $img_banner = $row['ImgBanner'];
                    ?>
                        <div class="bg-white rounded-lg p-4">
                            <div class="flex items-center">
                                <!-- Display the club banner -->
                                <img src="<?php echo $img_banner; ?>" alt="<?php echo $cca_name; ?>" class="w-40 h-40 object-cover mb-2">
                                <div class="ml-4">
                                    <h3 class="text-gray-500"><?php echo $cca_name; ?></h3>
                                    <p class="text-gray-500">Joined by: <?php echo $fullname; ?></p>
                                    <p class="text-gray-500">Date Joined: <?php echo $joining_date; ?></p>
                                    <!-- You can add more details about the club here -->
                                </div>
                            </div>
                            <!-- Assuming you want to view club details -->
                            <a href="#" class="flex justify-end text-black font-bold py-2 px-4 mt-4">View Club</a>
                        </div>
                    <?php
                    }
                    ?>
                </div>

                <div class="p-4 bg-blue-900 fixed bottom-0 w-full">
                    <div class="flex justify-around text-zinc-200">
                        <span><a href="studentpage.php">Home</a></span>
                        <span><a href="#">Activity</a></span>
                        <span><a href="leaderboard.php">Scores</a></span>
                        <span><a href="settingpage.php">Settings</a></span>
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