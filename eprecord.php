<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="bg-cover bg-repeat bg-center text-white font-sans" style="background-image: url('./assets/background.png');">
        <div class="flex flex-col h-screen text-black">

            <div class="flex justify-between items-center py-8 px-4 bg-sky-400 rounded-br-[30px] rounded-bl-[30px] border-2 border-black">
                <a href="settingpage.php"><img src="./assets/left-arrow.png" alt="back" class="rounded-full ml-3 size-7" /></a>
                <h1 class="text-xl font-bold text-white">Ep Records</h1>
                <a href="notificationpage.php"><img src="./assets/bell.png" alt="bell" class="rounded-full ml-3 size-7" /></a>
            </div>

            <div class="flex flex-col gap-3 py-6 px-4 mb-4">
                <?php
                session_start();
                include 'db_conn.php'; // Include your database connection file

                // Fetch data from student_attendance table and join with clubs table to get club names
                $sql = "SELECT sa.*, c.ClubName AS club_name FROM student_attendance sa JOIN clubs c ON sa.club_id = c.ClubID";

                $result = $conn->query($sql);

                // Check if there are any records
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        // Output HTML to display the data
                        echo '<div class="bg-white p-5 rounded-[30px] shadow-lg mb-4 border-2 border-black">';
                        echo '<div class="flex justify-center mb-4" style="border-bottom: 2px solid black;">';
                        echo '<img src="' . $row['img_banner'] . '" alt="Club Image" style="object-fit: cover; width: 100%; height: 100%;">';
                        echo '</div>';
                        echo '<div class="flex flex-col gap-2 text-lg">';
                        echo '<p class="font-bold flex justify-between" style="border-bottom: 1px solid black;">Club: <span class="font-normal text-right">' . $row['club_name'] . '</span></p>';
                        echo '<p class="font-bold flex justify-between" style="border-bottom: 1px solid black;">Attendance: <span class="font-normal text-right">' . $row['attendance_status'] . '</span></p>';
                        echo '<p class="font-bold flex justify-between" style="border-bottom: 1px solid black;">Sign In: <span class="font-normal text-right">' . $row['sign_in_date'] . '</span></p>';
                        echo '<p class="font-bold flex justify-between" style="border-bottom: 1px solid black;">Date: <span class="font-normal text-right">' . $row['sign_in_date'] . '</span></p>';
                        echo '<p class="font-bold flex justify-between">Ep Gained: <span class="font-normal text-right">+' . $row['club_point'] . '</span></p>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    // If no records found
                    echo "No records found";
                }

                // Close the database connection
                $conn->close();
                ?>

            </div>

        </div>

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

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
</body>

</html>