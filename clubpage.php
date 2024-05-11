<?php
session_start();
include 'db_conn.php';

if (isset($_SESSION['student_id']) && isset($_SESSION['fullname']) && isset($_SESSION['profileimg'])) {
    // Check if ClubID is set in the URL
    if (isset($_GET['ClubID'])) {
        $club_id = $_GET['ClubID'];

        // Retrieve club details from the database
        $sql = "SELECT * FROM clubs WHERE ClubID = '$club_id'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Check if the student has already joined the club
            $student_id = $_SESSION['student_id'];
            $check_sql = "SELECT * FROM student_cca WHERE student_id = '$student_id' AND cca_name = '{$row['ClubName']}'";
            $check_result = mysqli_query($conn, $check_sql);

            // If the student has already joined the club, hide the join button and show the session button
            $is_joined = mysqli_num_rows($check_result) > 0;
?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <script src="https://cdn.tailwindcss.com"></script>
                <title><?php echo $row['ClubName']; ?> Detail</title>
                <style>
                    /* Add your CSS styles here */
                    .join-form input {
                        margin-right: 10px;
                    }
                </style>
            </head>

            <body class="bg-white text-black">

                <div class="max-w-screen-lg mx-auto">
                    <div class="py-6 px-4 bg-sky-400 rounded-br-[30px] rounded-bl-[30px] border-2 border-black">

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <a href="activitypage.php">
                                    <img src="./assets/left-arrow.png" alt="profile" class="rounded-full ml-3 size-7" />
                                </a>
                            </div>
                            <div class="justify-self-center ml-3 text-white">
                                <h1 class="font-bold text-xl"><?php echo $row['ClubName']; ?> Detail</h1>
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
                            <img src="<?php echo $row['ImgBanner']; ?>" alt="<?php echo $row['ClubName']; ?>" class="rounded-xl mb-4 w-full h-full object-cover">
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold mb-2">Description</h2>
                            <p class="text-sm text-justify"><?php echo $row['Description']; ?></p>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold mb-2">Club Managers</h2>
                            <p class="text-sm text-justify"><?php echo $row['Club_Managers']; ?></p>
                        </div>
                        <div>
                            <h2 class="text-lg font-semibold mb-2">Sessions</h2>
                            <p class="text-sm text-justify"><?php echo $row['Sessions']; ?></p>
                        </div>
                    </div>

                    <br>

                    <div class="flex justify-around">
                        <!-- Hide or show the buttons based on whether the student has joined the club -->
                        <button id="joinButton" class="bg-sky-500 border-2 border-black text-white px-4 py-2 rounded-[10px] mb-2 md:mb-0" <?php echo $is_joined ? 'style="display:none;"' : ''; ?>>Join</button>
                        <button id="sessionButton" class="bg-sky-900 shadow-lg border-2 border-black text-white px-10 py-2 rounded-[10px] mb-2 md:mb-0" <?php echo $is_joined ? '' : 'style="display:none;"'; ?>>Session</button>
                    </div>



                    <!-- Join Club Form Popup -->
                    <div id="joinForm" class="hidden fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-75 flex items-center justify-center">
                        <div class="bg-white  pt-10 py-8 px-16 border-2 border-black rounded-tr-[50px] rounded-bl-[50px] rounded-[20px] shadow-md flex flex-col items-center relative join-form">
                            <!-- Back button -->
                            <a href="activitypage.php" class="absolute top-0 left-0 mt-3 ml-3 z-10 flex items-center">
                                <img src="./assets/left-arrow.png" alt="Back" class="rounded-full size-5 text-base text-sky-800 mr-2" /><span class="text-base text-sky-800">Activities</span>
                            </a>
                            <!-- Content -->
                            <h2 class="text-lg font-bold mb-4">Join Club</h2>
                            <form id="joinClubForm" class="flex flex-col items-center">
                                <input type="text" id="studentID" name="studentID" placeholder="Student ID" class="border-2 border-sky-800 rounded-full py-2 px-8 mb-4" required><br>
                                <input type="text" id="fullname" name="fullname" placeholder="Full Name" class="border-2 border-sky-800 rounded-full py-2 px-8 mb-4" required><br>
                                <input type="text" id="groupCode" name="groupCode" placeholder="Group Code" class="border-2 border-sky-800 rounded-full py-2 px-8 mb-4" required><br>
                                <button type="submit" class="bg-sky-500 hover:bg-sky-900 text-white rounded-full px-8 py-2 shadow-lg">Submit</button>
                            </form>
                        </div>
                    </div>

                    <!-- Session Sign-in Form Popup -->
                    <div id="sessionForm" class="hidden fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-75 flex items-center justify-center">
                        <div class="bg-white pt-10 py-8 px-16 border-2 border-black rounded-tr-[50px] rounded-bl-[50px] rounded-[20px] shadow-md flex flex-col items-center relative join-form">
                            <!-- Back button -->
                            <a href="activitypage.php" class="absolute top-0 left-0 mt-3 ml-3 z-10 flex items-center">
                                <img src="./assets/left-arrow.png" alt="Back" class="rounded-full size-5 text-base text-sky-800 mr-2" /><span class="text-base text-sky-800">Activities</span>
                            </a>
                            <!-- Content -->
                            <h2 class="text-lg font-bold mb-4">Session Sign-in</h2>
                            <form id="sessionSignInForm" action="attendance_signin.php" method="POST" class="flex flex-col items-center">
                                <input type="hidden" id="studentID" name="studentID" value="<?php echo $_SESSION['student_id']; ?>">
                                <input type="hidden" id="clubID" name="clubID" value="<?php echo $club_id; ?>">
                                <input type="text" id="sessionCode" name="sessionCode" placeholder="4HR9023" class="border-2 border-sky-800 rounded-full py-2 px-8 mb-4" required>
                                <button type="submit" class="bg-sky-500 hover:bg-sky-900 text-white rounded-full px-8 py-2 shadow-lg">Submit</button>
                            </form>
                        </div>
                    </div>


                    <script>
                        document.getElementById("joinButton").addEventListener("click", function() {
                            document.getElementById("joinForm").classList.remove("hidden");
                        });

                        document.getElementById("sessionButton").addEventListener("click", function() {
                            document.getElementById("sessionForm").classList.remove("hidden");
                        });

                        document.getElementById("joinClubForm").addEventListener("submit", function(event) {
                            event.preventDefault();

                            var formData = new URLSearchParams(new FormData(this));

                            fetch("join_club.php?ClubID=<?php echo $club_id; ?>", {
                                    method: "POST",
                                    body: formData
                                })
                                .then(response => response.json())
                                .then(data => {
                                    alert(data.message);
                                    if (data.success) {
                                        // Hide the join button and show the session button
                                        document.getElementById("joinButton").style.display = "none";
                                        document.getElementById("sessionButton").style.display = "block";
                                    }
                                })
                                .catch(error => {
                                    console.error("Error:", error);
                                });
                        });

                        document.getElementById("sessionSignInForm").addEventListener("submit", function(event) {
                            event.preventDefault();
                            this.submit();
                        });

                        document.getElementById('sessionForm').addEventListener('click', function(event) {
                            if (event.target === this) {
                                this.classList.add('hidden');
                            }
                        });
                    </script>
                </div>

                <!-- Footer -->
                <div class="p-4 bg-sky-400 fixed bottom-0 w-full font-bold text-lg rounded-tr-[20px] rounded-tl-[20px] border-2 border-black text-white">
                    <div class="flex justify-around items-center">
                        <a href="studentpage.php" class="flex flex-col items-center">
                            <img src="./assets/homeSelectedButton.png" alt="home" class="rounded-full size-8">
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
            echo "Club not found.";
        }
    } else {
        echo "ClubID parameter is missing.";
    }
} else {
    header("Location: index.php");
    exit();
}
?>