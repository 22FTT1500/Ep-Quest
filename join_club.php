<?php
session_start();
include 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the required fields are set
    if (isset($_POST['studentID']) && isset($_POST['fullname']) && isset($_POST['groupCode']) && isset($_GET['ClubID'])) {
        // Sanitize input to prevent SQL injection
        $studentID = mysqli_real_escape_string($conn, $_POST['studentID']);
        $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
        $groupCode = mysqli_real_escape_string($conn, $_POST['groupCode']);
        $clubID = mysqli_real_escape_string($conn, $_GET['ClubID']);

        // Fetch club details from the database to get the ClubName
        $sql_club = "SELECT ClubName FROM clubs WHERE ClubID = '$clubID'";
        $result_club = mysqli_query($conn, $sql_club);
        $row_club = mysqli_fetch_assoc($result_club);
        $clubName = $row_club['ClubName'];

        // Insert into student_cca table
        $sql = "INSERT INTO student_cca (student_id, cca_name, joining_date) VALUES ('$studentID', '$clubName', NOW())";
        if (mysqli_query($conn, $sql)) {
            $response = array("success" => true, "message" => "Joined club successfully.");
            echo json_encode($response);
        } else {
            $response = array("success" => false, "message" => "Error joining club: " . mysqli_error($conn));
            echo json_encode($response);
        }
    } else {
        $response = array("success" => false, "message" => "Missing required parameters.");
        echo json_encode($response);
    }
} else {
    header("Location: index.php");
    exit();
}
