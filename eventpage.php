<?php
session_start();
include 'db_conn.php';

if (isset($_SESSION['student_id']) && isset($_SESSION['fullname']) && isset($_SESSION['profileimg'])) {
    // Check if EventID is set in the URL
    if (isset($_GET['EventID'])) {
        $eventID = $_GET['EventID'];

        // Retrieve event details from the database
        $sql = "SELECT * FROM events WHERE EventID = '$eventID'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Check if the student has already joined the event
            $studentID = $_SESSION['student_id'];
            $checkSql = "SELECT * FROM student_event WHERE student_id = '$studentID' AND event_id = '$eventID'";
            $checkResult = mysqli_query($conn, $checkSql);

            // If the student has already joined the event, hide the join button and show the session button
            $isJoined = mysqli_num_rows($checkResult) > 0;
?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <script src="https://cdn.tailwindcss.com"></script>
                <title><?php echo $row['EventName']; ?> Detail</title>
            </head>

            <body class="bg-white text-black">

                <div class="max-w-screen-lg mx-auto">
                    <div class="py-6 px-4 bg-sky-400 rounded-br-[30px] rounded-bl-[30px] border-2 border-black">

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <a href="activitypage.php"><img src="./assets/left-arrow.png" alt="profile" class="rounded-full ml-3 size-7" /></a>

                            </div>
                            <div class="justify-self-center ml-3 text-white">
                                <h1 class="font-bold text-xl"><?php echo $row['EventName']; ?> Detail</h1>
                            </div>
                            <div>
                                <a href="notificationpage.php">
                                    <img src="./assets/bell.png" alt="profile" class="rounded-full ml-3 size-7" />
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 p-4 text-black">
                        <div class="flex items-center justify-center">
                            <!-- Display Event details -->
                            <img src="<?php echo $row['ImgBanner']; ?>" alt="<?php echo $row['EventName']; ?>" class="rounded-xl mb-4 w-full h-full object-cover">
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold mb-2">Description</h2>
                            <p class="text-sm text-justify"><?php echo $row['Description']; ?></p>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold mb-2 mt-4">Event Date</h2>
                            <p class="text-sm text-justify"><?php echo $row['EventDate']; ?></p>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold mb-2 mt-4">Event Time</h2>
                            <p class="text-sm text-justify"><?php echo $row['EventTime']; ?></p>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold mb-2 mt-4">Venue</h2>
                            <p class="text-sm text-justify"><?php echo $row['EventLocation']; ?></p>
                        </div>

                        <br>

                        <!-- Display Join or joined Button based on student's participation status -->
                        <div class="flex justify-around">
                            <button id="joinButton" class="bg-sky-500 border-2 border-black text-white px-4 py-2 rounded-[10px] mb-2 md:mb-0" <?php echo $isJoined ? 'style="display:none;"' : ''; ?>>Join</button>
                            <button id="joinedButton" class="bg-sky-900 shadow-lg border-2 border-black text-white px-10 py-2 rounded-[10px] mb-2 md:mb-0" <?php echo $isJoined ? '' : 'style="display:none;"'; ?>>Joined!</button>
                        </div>
                    </div>

                    <!-- Join Event Form Popup -->
                    <div id="joinForm" class="hidden fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-75 flex items-center justify-center">
                        <div class="bg-white  pt-10 py-8 px-16 border-2 border-black rounded-tr-[50px] rounded-bl-[50px] rounded-[20px] shadow-md flex flex-col items-center relative join-form">
                            <!-- Back button -->
                            <a href="activitypage.php" class="absolute top-0 left-0 mt-3 ml-3 z-10 flex items-center">
                                <img src="./assets/left-arrow.png" alt="Back" class="rounded-full size-5 text-base text-sky-800 mr-2" /><span class="text-base text-sky-800">Activities</span>
                            </a>
                            <!-- Content -->
                            <h2 class="text-lg font-bold mb-4">Join Event</h2>
                            <form id="joinEventForm" class="flex flex-col items-center">
                                <input type="text" id="studentID" name="studentID" value="<?php echo $_joined['student_id']; ?>" style="display: none;">
                                <input type="text" id="eventID" name="eventID" value="<?php echo $eventID; ?>" style="display: none;">
                                <button type="submit" class="bg-sky-500 hover:bg-sky-900 text-white rounded-full px-8 py-2 shadow-lg">Submit</button>
                            </form>
                        </div>
                    </div>

                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            // Show Join Form when Join Button is clicked
                            document.getElementById("joinButton").addEventListener("click", function() {
                                document.getElementById("joinForm").classList.remove("hidden");
                            });

                            // Handle Join Event Form Submission
                            document.getElementById("joinEventForm").addEventListener("submit", function(event) {
                                event.preventDefault();

                                var formData = new URLSearchParams(new FormData(this));

                                fetch("join_event.php", {
                                        method: "POST",
                                        body: formData
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        alert(data.message);
                                        if (data.success) {
                                            // Hide the join button and show the joined button
                                            document.getElementById("joinButton").style.display = "none";
                                            document.getElementById("joinedButton").style.display = "block";
                                        }
                                    })
                                    .catch(error => {
                                        console.error("Error:", error);
                                    });
                            });
                        });

                        document.getElementById("joinEventForm").addEventListener("submit", function(event) {
                            event.preventDefault();
                            this.submit();
                        });
                    </script>

                    <br><br><br><br><br>

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

            </body>

            </html>
<?php
        } else {
            echo "Event not found.";
        }
    } else {
        echo "EventID parameter is missing.";
    }
} else {
    header("Location: index.php");
    exit();
}
?>