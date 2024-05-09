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
                                <h1 class="font-bold"><?php echo $row['ClubName']; ?> Detail</h1>
                            </div>
                            <div>
                                <img src="./assets/bell.png" alt="profile" class="rounded-full ml-3 size-7" />
                            </div>
                        </div>
                    </div>
                    <img src="<?php echo $row['ImgBanner']; ?>" alt="<?php echo $row['ClubName']; ?>" class="w-full">
                    <div class="p-4">
                        <h2 class="text-lg font-bold">Description</h2>
                        <p><?php echo $row['Description']; ?></p>
                        <h2 class="text-lg font-bold mt-4">Club Managers</h2>
                        <p><?php echo $row['Club_Managers']; ?></p>
                        <h2 class="text-lg font-bold mt-4">Sessions</h2>
                        <p><?php echo $row['Sessions']; ?></p>
                    </div>
                    <div class="flex justify-around p-4 bg-zinc-100">
                        <button id="joinButton" class="bg-blue-500 text-white rounded-lg px-4 py-2">Join</button>
                    </div>
                </div>

                <!-- Join Club Form Popup -->
                <div id="joinForm" class="hidden fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-75 flex items-center justify-center">
                    <div class="bg-white p-8 rounded-lg shadow-md join-form">
                        <h2 class="text-lg font-bold mb-4">Join Club</h2>
                        <form id="joinClubForm">
                            <input type="text" id="studentID" name="studentID" placeholder="Student ID" required>
                            <input type="text" id="fullname" name="fullname" placeholder="Full Name" required>
                            <input type="text" id="groupCode" name="groupCode" placeholder="Group Code" required>
                            <button type="submit" class="bg-blue-500 text-white rounded-lg px-4 py-2">Submit</button>
                        </form>
                    </div>
                </div>

                <script>
                    document.getElementById("joinButton").addEventListener("click", function() {
                        document.getElementById("joinForm").classList.remove("hidden");
                    });

                    document.getElementById("joinClubForm").addEventListener("submit", function(event) {
                        event.preventDefault();

                        var formData = new FormData(this);

                        fetch("join_club.php?ClubID=<?php echo $club_id; ?>", {
                                method: "POST",
                                body: formData,
                                headers: {
                                    "Content-Type": "application/x-www-form-urlencoded"
                                }
                            })
                            .then(response => response.json())
                            .then(data => {
                                alert(data.message);
                                if (data.success) {
                                    // Handle success, like showing a success message or redirecting
                                }
                            })
                            .catch(error => {
                                console.error("Error:", error);
                            });
                    });
                </script>

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