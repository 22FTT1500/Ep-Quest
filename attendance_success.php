<?php
session_start();
include 'db_conn.php';

if (isset($_SESSION['student_id']) && isset($_SESSION['fullname']) && isset($_SESSION['profileimg'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['clubID']) && isset($_POST['sessionCode'])) {
            $student_id = $_SESSION['student_id'];
            $student_name = $_SESSION['fullname']; // Assuming student's name is stored in session
            $club_id = $_POST['clubID'];
            $session_code = $_POST['sessionCode'];

            // Retrieve club details from the database
            $sql = "SELECT ImgBanner, ClubPoint FROM clubs WHERE ClubID = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $club_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $club_row = $result->fetch_assoc();
            $img_banner = $club_row['ImgBanner'];
            $club_point = $club_row['ClubPoint'];

            // Insert attendance record into the database
            $insert_sql = "INSERT INTO student_attendance (student_id, name, club_id, attendance_status, sign_in_date, img_banner, club_point) VALUES (?, ?, ?, ?, NOW(), ?, ?)";
            $stmt = $conn->prepare($insert_sql);
            $status = "attended"; // Assuming the student attended the session
            $stmt->bind_param("ssisss", $student_id, $student_name, $club_id, $status, $img_banner, $club_point);
            if ($stmt->execute()) {
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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mx-auto mt-10 p-8 bg-white shadow-md rounded-md">
        <img src="<?php echo $_SESSION['profileimg']; ?>" alt="Profile Image" class="w-24 h-24 mx-auto rounded-full mb-4">
        <h2 class="text-2xl font-bold mb-4">Attendance Recorded Successfully!</h2>
        <p><strong>Student ID:</strong> <?php echo $_SESSION['student_id']; ?></p>
        <p><strong>Full Name:</strong> <?php echo $_SESSION['fullname']; ?></p>
        <p><strong>Sign-in Date:</strong> <?php echo $_SESSION['sign_in_date']; ?></p>
        <p><strong>Club Earned Point:</strong> <?php echo $_SESSION['club_point']; ?></p>
        <button onclick="window.location.href = 'clubpage.php?ClubID=<?php echo $_SESSION['club_id']; ?>';" class="btn mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">OK</button>
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