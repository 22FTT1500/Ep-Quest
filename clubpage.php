<?php
session_start();
include 'db_conn.php';

if (isset($_SESSION['student_id']) && isset($_SESSION['fullname']) && isset($_SESSION['profileimg'])) {
    // Check if ClubID is set in the URL
    if (isset($_GET['ClubID'])) {
        $club_id = $_GET['ClubID'];

        // Retrieve club details from the database
        $sql = "SELECT * FROM clubs WHERE ClubID = '$club_id'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <script src="https://cdn.tailwindcss.com"></script>
                <title><?php echo $row['ClubName']; ?> Detail</title>
            </head>

            <body>
                <div class="bg-white ">
                    <div class="p-4 bg-blue-900">
                        <!-- Profile Link -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <a href="activitypage.php"><img src="./assets/left-arrow.png" alt="profile" class="rounded-full ml-3 size-7" /></a>
                                <!-- add center title -->
                            </div>
                            <div class="justify-self-center ml-3">
                                <h1 class="font-bold"><?php echo $row['ClubName']; ?> Detail</h1>
                            </div>
                            <div>
                                <img src="./assets/bell.png" alt="profile" class="rounded-full ml-3 size-7" />
                            </div>
                        </div>
                    </div>
                    <img src="<?php echo $row['ImgBanner']; ?>" alt="<?php echo $row['ClubName']; ?>" class="w-full">
                    <div class="p-4">
                        <h2 class="text-lg font-bold">Description</h2>
                        <p><?php echo $row['Description']; ?></p>
                        <h2 class="text-lg font-bold mt-4">Club Managers</h2>
                        <p><?php echo $row['Club_Managers']; ?></p>
                        <h2 class="text-lg font-bold mt-4">Sessions</h2>
                        <p><?php echo $row['Sessions']; ?></p>
                    </div>
                    <div class="flex justify-around p-4 bg-zinc-100">
                        <button class="bg-blue-500 text-white rounded-lg px-4 py-2">Joined</button>
                        <button class="bg-zinc-300 rounded-lg px-4 py-2">Session</button>
                    </div>
                </div>

            </body>

            </html>
<?php
        } else {
            echo "Club not found.";
        }
    } else {
        echo "ClubID parameter is missing.";
    }
} else {
    header("Location: index.php");
    exit();
}
?>