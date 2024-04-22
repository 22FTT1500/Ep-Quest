<?php
session_start();
include 'db_conn.php';
if (isset($_SESSION['student_id']) && isset($_SESSION['student_id'])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Document</title>
    </head>

    <body class="bg-zinc-100 min-h-screen flex flex-col">
        <!-- Navigation Bar -->
        <nav class="bg-blue-600 text-white py-4">
            <div class="container mx-auto flex justify-between items-center">
                <!-- Profile Link -->
                <div class="flex items-center">
                    <img src="https://placehold.co/40x40" alt="profile" class="rounded-full ml-3" />
                    <div class="ml-3">
                        <h1 class="font-bold"><?php echo $_SESSION['student_id']; ?></h1>
                        <p class="text-sm">22ft1414@student.pb.edu.bn</p>
                    </div>
                </div>

                <!-- Navigation Links (if any) -->
                <!-- Add your navigation links here -->

                <!-- Logo or Brand Name (if any) -->
                <!-- Add your logo or brand name here -->
            </div>
        </nav>

        <!-- Main Content Area -->
        <div class="flex-grow">
            <!-- Your main content goes here -->
            <a href="logout.php">Logout</a>
        </div>

        <!-- Bottom Footer -->
        <footer class="bg-blue-600 text-white py-4">
            <div class="container mx-auto text-center">
                <!-- Footer content -->
                &copy; 2024 EP-QUEST. All rights reserved.
            </div>
        </footer>
    </body>


    </html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>