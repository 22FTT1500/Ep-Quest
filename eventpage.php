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

            <body>
                <div class="bg-white">
                    <div class="p-4 bg-blue-900">
                        <!-- Profile Link -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <a href="activitypage.php"><img src="./assets/left-arrow.png" alt="profile" class="rounded-full ml-3 size-7" /></a>
                                <!-- add center title -->
                            </div>
                            <div class="justify-self-center ml-3">
                                <h1 class="font-bold"><?php echo $row['EventName']; ?> Detail</h1>
                            </div>
                            <div>
                                <img src="./assets/bell.png" alt="profile" class="rounded-full ml-3 size-7" />
                            </div>
                        </div>
                    </div>
                    <!-- Display Event details -->
                    <img src="<?php echo $row['ImgBanner']; ?>" alt="<?php echo $row['EventName']; ?>" class="w-full">
                    <div class="p-4">
                        <h2 class="text-lg font-bold">Description</h2>
                        <p><?php echo $row['Description']; ?></p>
                        <h2 class="text-lg font-bold mt-4">Event Date</h2>
                        <p><?php echo $row['EventDate']; ?></p>
                        <h2 class="text-lg font-bold mt-4">Event Time</h2>
                        <p><?php echo $row['EventTime']; ?></p>
                        <h2 class="text-lg font-bold mt-4">Venue</h2>
                        <p><?php echo $row['EventLocation']; ?></p>
                    </div>
                    <!-- Display Join or joined Button based on student's participation status -->
                    <div class="flex justify-around p-4 bg-zinc-100">
                        <button id="joinButton" class="bg-blue-500 text-white rounded-lg px-4 py-2" <?php echo $isJoined ? 'style="display:none;"' : ''; ?>>Join</button>
                        <button id="joinedButton" class="bg-green-500 text-white rounded-lg px-4 py-2" <?php echo $isJoined ? '' : 'style="display:none;"'; ?>>Joined!</button>
                    </div>
                </div>

                <!-- Join Event Form Popup -->
                <div id="joinForm" class="hidden fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-75 flex items-center justify-center">
                    <div class="bg-white p-8 rounded-lg shadow-md join-form">
                        <h2 class="text-lg font-bold mb-4">Join Event</h2>
                        <form id="joinEventForm">
                            <input type="text" id="studentID" name="studentID" value="<?php echo $_joined['student_id']; ?>" style="display: none;">
                            <input type="text" id="eventID" name="eventID" value="<?php echo $eventID; ?>" style="display: none;">
                            <button type="submit" class="bg-blue-500 text-white rounded-lg px-4 py-2">Submit</button>
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
                </script>

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