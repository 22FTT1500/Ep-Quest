<?php
session_start();
include 'db_conn.php';

if (isset($_SESSION['student_id']) && isset($_POST['eventID'])) {
    $studentID = $_SESSION['student_id'];
    $eventID = $_POST['eventID'];
    $event_name = ""; // Placeholder for event name

    // Retrieve event details from the events table to get event name
    $eventQuery = "SELECT EventName FROM events WHERE EventID = '$eventID'";
    $eventResult = mysqli_query($conn, $eventQuery);
    if ($eventResult && mysqli_num_rows($eventResult) > 0) {
        $eventRow = mysqli_fetch_assoc($eventResult);
        $event_name = $eventRow['EventName'];
    }

    // Insert data into student_event table
    $insertSql = "INSERT INTO student_event (student_id, event_id, event_name, signIn) VALUES ('$studentID', '$eventID', '$event_name', NOW())";
    if (mysqli_query($conn, $insertSql)) {
        $response = array("success" => true, "message" => "You have successfully joined the event.");
    } else {
        $response = array("success" => false, "message" => "Error: " . mysqli_error($conn));
    }

    echo json_encode($response);
} else {
    $response = array("success" => false, "message" => "Invalid request.");
    echo json_encode($response);
}
