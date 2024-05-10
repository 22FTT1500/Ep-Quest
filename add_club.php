<?php
session_start();
include 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form fields are set and not empty
    if (isset($_POST['club_name']) && isset($_POST['description']) && isset($_POST['club_manager']) && isset($_POST['sessions']) && isset($_POST['club_point'])) {
        // Assign form values to variables
        $clubName = $_POST['club_name'];
        $description = $_POST['description'];
        $clubManager = $_POST['club_manager'];
        $sessions = $_POST['sessions'];
        $clubPoint = $_POST['club_point'];

        // Check if file has been uploaded
        if (isset($_FILES['img_banner']) && $_FILES['img_banner']['error'] === UPLOAD_ERR_OK) {
            // Process the uploaded file
            $imgTmpName = $_FILES['img_banner']['tmp_name'];
            $imgData = file_get_contents($imgTmpName);

            // Move the uploaded file to a directory
            $imgPath = 'assets/' . $_FILES['img_banner']['name'];
            // Set the path where you want to store the image
            move_uploaded_file($imgTmpName, $imgPath); // Move the uploaded file to the specified directory
        } else {
            // Set a default image or handle the absence of an image
            $imgPath = 'default_image.jpg'; // Change this to your default image path or handle absence of image
            $imgData = file_get_contents($imgPath); // Get image data
        }

        // Generate a unique ClubID using a combination of time-based and random components
        $clubID = substr(md5(uniqid(mt_rand(), true)), 0, 9); // Generates a 9-character unique ID

        // Prepare and execute SQL statement to insert the new club into the database
        $stmt = $conn->prepare("INSERT INTO clubs (ClubID, ClubName, Description, Club_Managers, Sessions, ClubPoint, ImgBanner) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssiss", $clubID, $clubName, $description, $clubManager, $sessions, $clubPoint, $imgPath); // Save image path instead of image data

        if ($stmt->execute()) {
            // Club added successfully
            header("Location: adminmanageclub.php"); // Redirect back to activity page
            exit();
        } else {
            // Error occurred while adding club
            echo "Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        // One or more form fields are not set
        echo "All fields are required.";
    }
} else {
    // Redirect to index page if accessed directly
    header("Location: index.php");
    exit();
}
