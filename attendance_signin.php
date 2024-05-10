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

            // Fetch the img_banner and club_point from the clubs table
            $club_query = "SELECT ImgBanner, ClubPoint FROM clubs WHERE ClubID = ?";
            $club_stmt = $conn->prepare($club_query);
            $club_stmt->bind_param("s", $club_id);
            $club_stmt->execute();
            $club_result = $club_stmt->get_result();
            $club_row = $club_result->fetch_assoc();
            $img_banner = $club_row['ImgBanner'];
            $club_point = $club_row['ClubPoint'];

            // Insert attendance record into the database
            $insert_sql = "INSERT INTO student_attendance (student_id, name, club_id, attendance_status, sign_in_date, img_banner, club_point) VALUES (?, ?, ?, ?, NOW(), ?, ?)";
            $stmt = $conn->prepare($insert_sql);
            $status = "attended"; // Assuming the student attended the session
            $stmt->bind_param("sssssi", $student_id, $student_name, $club_id, $status, $img_banner, $club_point);
            if ($stmt->execute()) {
                // Successfully inserted attendance record

                // Set session variables
                $_SESSION['club_id'] = $club_id;
                $_SESSION['sign_in_date'] = date('Y-m-d H:i:s'); // Assuming current date and time
                $_SESSION['club_point'] = $club_point;

                // Redirect to attendance_success.php
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
        echo "Invalid request method.";
    }
} else {
    header("Location: index.php");
    exit();
}
