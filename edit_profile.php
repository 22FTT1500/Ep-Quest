<?php
session_start();
include 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form fields are set and not empty
    if (isset($_SESSION['student_id']) && isset($_FILES['profile_img']) && $_FILES['profile_img']['error'] === UPLOAD_ERR_OK) {
        // Get the user's ID
        $studentId = $_SESSION['student_id'];

        // Process the uploaded file
        $imgTmpName = $_FILES['profile_img']['tmp_name'];
        $imgData = file_get_contents($imgTmpName);

        // Move the uploaded file to a directory and get the image path
        $imgPath = 'assets/' . $_FILES['profile_img']['name'];
        move_uploaded_file($imgTmpName, $imgPath);

        // Prepare and execute SQL statement to update the user's profile image in the database
        $stmt = $conn->prepare("UPDATE student_details SET profileimg = ? WHERE student_id = ?");
        $stmt->bind_param("ss", $imgPath, $studentId);

        if ($stmt->execute()) {
            // Profile image updated successfully
            $_SESSION['profileimg'] = $imgPath; // Update session data with new profile image path
            header("Location: manageprofile.php"); // Redirect back to manage profile page
            exit();
        } else {
            // Error occurred while updating profile image
            echo "Error: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        // One or more form fields are not set or file upload error occurred
        echo "Please select a valid image file.";
    }
} else {
    // Redirect to index page if accessed directly
    header("Location: index.php");
    exit();
}
