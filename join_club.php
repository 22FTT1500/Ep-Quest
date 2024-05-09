<?php
session_start();
include 'db_conn.php';

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $studentID = $_POST["studentID"];
    $fullname = $_POST["fullname"];
    $groupCode = $_POST["groupCode"];
    $clubID = $_GET["ClubID"];

    if (!empty($studentID) && !empty($fullname) && !empty($groupCode)) {
        $sql = "UPDATE student_details SET joined_club = '$clubID' WHERE student_id = '$studentID'";
        if (mysqli_query($conn, $sql)) {
            $response["success"] = true;
            $response["message"] = "Joined club successfully!";
        } else {
            $response["success"] = false;
            $response["message"] = "Error joining club: " . mysqli_error($conn);
        }
    } else {
        $response["success"] = false;
        $response["message"] = "Please fill in all fields.";
    }
} else {
    $response["success"] = false;
    $response["message"] = "Invalid request method.";
}

echo json_encode($response);
