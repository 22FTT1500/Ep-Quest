<?php
// Include database connection
include 'db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['club_id'])) {
    // Retrieve club ID from POST data
    $clubId = $_POST['club_id'];

    // Prepare and execute SQL statement to delete the club from the database
    $stmt = $conn->prepare("DELETE FROM clubs WHERE ClubID = ?");
    $stmt->bind_param("s", $clubId);

    if ($stmt->execute()) {
        // Club deleted successfully
        echo "Club deleted successfully.";
    } else {
        // Error occurred while deleting club
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
} else {
    // Invalid request
    echo "Invalid request.";
}
