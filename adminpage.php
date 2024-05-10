<?php
session_start();
include 'db_conn.php';
if (isset($_SESSION['student_id']) && isset($_SESSION['student_id']) && isset($_SESSION['profileimg'])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Setting</title>
    </head>

    <body class="bg-cover bg-repeat bg-center text-black font-sans" style="background-image: url('./assets/background.png');">
        <div class="flex flex-col">
            <!-- Header -->
            <div class="py-8 px-4 bg-sky-400 rounded-br-[30px] rounded-bl-[30px] border-2 border-black text-white">
                <div class="flex items-center">
                    <div>
                        <a href="manageprofile.php">
                            <img src="<?php echo $_SESSION['profileimg']; ?>" alt="profile" class="rounded-full ml-3 size-16" />
                        </a>
                    </div>
                    <div class="ml-3">
                        <h1 class="font-bold"><?php echo $_SESSION['fullname']; ?></h1>
                        <p class="text-base">22ft1414@student.pb.edu.bn</p>
                    </div>

                </div>
            </div>

            <h2 class="text-center text-2xl font-bold text-black my-4 mx-2 bg-white block inline">Settings</h2>

            <!-- Manage profile card button -->
            <div class="mx-4 my-4 p-4 bg-sky-900 rounded-[20px] text-center text-white font-bold text-xl">
                <a href="adminmanageclub.php"><button class="">Manage Club & Event</button></a>
            </div>

            <div class="mx-4 my-4 p-4 bg-sky-900 rounded-[20px] text-center text-red font-bold text-xl">
                <a href="logout.php"><button class="text-red-600">Logout</button></a>
            </div>

            <!-- Footer -->
            <div class="p-4 bg-sky-400 fixed bottom-0 w-full font-bold text-lg rounded-tr-[20px] rounded-tl-[20px] border-2 border-black text-white">
                <div class="flex justify-around items-center">
                    <!-- Add footer content here -->
                </div>
            </div>

        </div>
    </body>


    </html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>