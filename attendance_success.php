<?php
session_start();
include 'db_conn.php';

if (isset($_SESSION['student_id']) && isset($_SESSION['fullname']) && isset($_SESSION['profileimg']) && isset($_SESSION['grpcode'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['clubID']) && isset($_POST['sessionCode'])) {
            $student_id = $_SESSION['student_id'];
            $student_name = $_SESSION['fullname']; // Assuming student's name is stored in session
            $club_id = $_POST['clubID'];
            $session_code = $_POST['sessionCode'];

            // Retrieve club details from the database including ClubName
            $sql = "SELECT ImgBanner, ClubPoint, ClubName FROM clubs WHERE ClubID = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $club_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $club_row = $result->fetch_assoc();
            $img_banner = $club_row['ImgBanner'];
            $club_point = $club_row['ClubPoint'];
            $club_name = $club_row['ClubName'];

            // Insert attendance record into the database
            $insert_sql = "INSERT INTO student_attendance (student_id, name, club_id, attendance_status, sign_in_date, img_banner, club_point) VALUES (?, ?, ?, ?, NOW(), ?, ?)";
            $stmt = $conn->prepare($insert_sql);
            $status = "attended"; // Assuming the student attended the session
            $stmt->bind_param("ssisss", $student_id, $student_name, $club_id, $status, $img_banner, $club_point);
            if ($stmt->execute()) {
                // Update total_ep_points for the student
                $update_sql = "UPDATE student_details SET total_ep_points = total_ep_points + ? WHERE student_id = ?";
                $stmt_update = $conn->prepare($update_sql);
                $stmt_update->bind_param("is", $club_point, $student_id);
                $stmt_update->execute();

                // Set ClubName in session
                $_SESSION['ClubName'] = $club_name;

                // Redirect to attendance_success.php
                $_SESSION['club_id'] = $club_id;
                $_SESSION['sign_in_date'] = date("Y-m-d H:i:s");
                $_SESSION['club_point'] = $club_point;

                header("Location: attendance_success.php");
                exit();
            } else {
                // Error occurred while inserting record
                echo "Error: " . $stmt->error;
            }
        } else {
            echo "Missing parameters.";
        }
    } else {
        echo "";
    }
} else {
    header("Location: index.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Success</title>
    <!-- Include Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-b from-white to-blue-200 h-screen relative">
    <!-- Attendance Reg -->
    <div class="fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-75 flex items-center justify-center">
        <div class="bg-white shadow-md overflow-hidden w-96 border-black border-4 rounded-[20px]">
            <!-- Blue background section -->
            <div class="bg-sky-900 p-6 text-white">
                <img src="./assets/correct.png" alt="green tick" class="w-32 h-32 mx-auto mb-4">
                <h2 class="text-lg font-bold text-center">Thank you for joining!</h2>
                <h1 class="text-3xl font-bold text-center"><?php echo $_SESSION['ClubName']; ?></h1>
                <br>
                <p class="text-base text-center">Sign In: <?php echo $_SESSION['sign_in_date']; ?></p>
            </div>
            <!-- White background section -->
            <div class="bg-white p-6 flex items-center">
                <a href="manageprofile.php">
                    <img src="<?php echo $_SESSION['profileimg']; ?>" alt="profile" class="rounded-full w-16 h-16 mr-3">
                </a>
                <div class="ml-3">
                    <h2 class="font-bold"><?php echo $_SESSION['fullname']; ?></h2>
                    <p class="text-sm"><?php echo $_SESSION['student_id']; ?></p>
                    <p class="text-sm"><?php echo $_SESSION['grpcode']; ?></p>
                </div>
            </div>
            <!-- "You earned 4 EP points" section -->
            <div class="bg-white mx-4 py-1 px-2 border-2 border-sky-900 rounded-[30px] flex items-center justify-between"> <!-- Added justify-between -->
                <div> <!-- Removed flex-grow -->
                    <p class="text-sm font-semibold">You earned <?php echo $_SESSION['club_point']; ?> EP points!</p>
                </div>
                <span class="bg-sky-900 text-white rounded-full px-2 py-1">+<?php echo $_SESSION['club_point']; ?></span> <!-- Moved +4 to the right -->
            </div>

            <!-- Button -->
            <div class="px-6 py-4 my-2 flex flex-col items-center">

                <button onclick="window.location.href = 'clubpage.php?ClubID=<?php echo $_SESSION['club_id']; ?>';" class="rounded-full bg-sky-900 text-white text-base font-semibold py-1 px-4 shadow-md">Back To Home</button>

            </div>
        </div>
    </div>
</body>

</html>
<?php
// Clear session data
unset($_SESSION['club_id']);
unset($_SESSION['sign_in_date']);
unset($_SESSION['club_point']);
exit();
?>