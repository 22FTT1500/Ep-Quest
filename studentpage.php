<?php
session_start();
include 'db_conn.php';
if (isset($_SESSION['student_id']) && isset($_SESSION['name'])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <h1>Welcome <?php echo $_SESSION['name']; ?></h1>
        <a href="logout.php">Logout</a>
    </body>

    </html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>