<?php
session_start();
include 'db_conn.php';

if (
    isset($_SESSION['student_id']) && isset($_SESSION['fullname'])
    && isset($_SESSION['email']) && isset($_SESSION['grpcode'])
    && isset($_SESSION['contactno']) && isset($_SESSION['course']) && isset($_SESSION['profileimg']) && isset($_SESSION['total_ep_points'])
) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Student Profile</title>
    </head>

    <body class="bg-cover bg-repeat bg-center text-black font-sans" style="background-image: url('./assets/background.png');">
        <div class="flex flex-col h-screen">
            <div class="py-8 px-4 bg-sky-400 rounded-br-[30px] rounded-bl-[30px] border-2 border-black">
                <!-- Profile Link -->
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <a href="settingpage.php"><img src="./assets/left-arrow.png" alt="profile" class="rounded-full ml-3 size-7" /></a>
                        <!-- add center title -->
                    </div>
                    <div class="justify-self-center ml-3">
                        <h1 class="font-bold text-xl text-white">Manage Profile</h1>
                    </div>
                    <div>
                        <a href="notificationpage.php">
                            <img src="./assets/bell.png" alt="bell" class="rounded-full ml-3 size-7" />
                        </a>
                    </div>
                </div>
            </div>

            <!-- Profile -->
            <div class="flex items-center">
                <div class="p-6 flex flex-col items-left">
                    <div class="mb-2 size-32">
                        <img src="<?php echo $_SESSION['profileimg']; ?>" alt="profile" class="rounded-full" />
                    </div>
                    <!-- Inside the HTML body -->
                    <button onclick="openEditProfileModal()" class="border-2 border-black rounded-full bg-white py-1 w-32 text-center">Edit Profile</button>
                </div>

                <!-- Edit Profile Modal -->
                <div id="editProfileModal" class="fixed top-0 left-0 w-full h-full bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
                    <div class="bg-white p-6 rounded-lg">
                        <h2 class="text-lg font-semibold mb-4">Edit Profile</h2>
                        <form id="editProfileForm" action="edit_profile.php" method="POST" enctype="multipart/form-data">
                            <!-- Profile Image -->
                            <input type="file" name="profile_img" class="block w-full border-gray-300 rounded-md mb-2">
                            <!-- Submit Button -->
                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-full">Submit</button>
                            <button type="button" onclick="closeEditProfileModal()" class="bg-red-500 text-white px-4 py-2 rounded-full ml-2">Cancel</button>
                        </form>
                    </div>
                </div>

                <div class="border-2 border-black bg-white p-4 rounded-[20px] text-left flex items-center ml-4 mr-5">
                    <div>
                        <p class="text-base font-normal">Total Ep Points</p>
                        <span class="text-5xl font-bold"><?php echo $_SESSION['total_ep_points']; ?></span>
                    </div>
                    <img src="./assets/token.png" alt="token" class="rounded-full size-20 ml-auto">
                </div>
            </div>

            <div class="px-4">
                <div class="border-2 border-black bg-white rounded-[20px] flex flex-col items-left py-6 px-4">

                    <p class="text-lg font-bold">
                        <span class="pl-2">Student ID</span>
                        <br>
                        <span class="border-2 border-zinc-400 rounded-full px-4 block w-full mb-2 font-normal"><?php echo $_SESSION['student_id']; ?></span>
                    </p>

                    <p class="text-lg font-bold">
                        <span class="pl-2">Full Name</span>
                        <br>
                        <span class="border-2 border-zinc-400 rounded-full px-4 block w-full mb-2 font-normal"><?php echo $_SESSION['fullname']; ?></span>
                    </p>

                    <p class="text-lg font-bold">
                        <span class="pl-2">Student Email</span>
                        <br>
                        <span class="border-2 border-zinc-400 rounded-full px-4 block w-full mb-2 font-normal"><?php echo $_SESSION['email']; ?></span>
                    </p>

                    <p class="text-lg font-bold">
                        <span class="pl-2">Group Code</span>
                        <br>
                        <span class="border-2 border-zinc-400 rounded-full px-4 block w-full mb-2 font-normal"><?php echo $_SESSION['grpcode']; ?></span>
                    </p>

                    <p class="text-lg font-bold">
                        <span class="pl-2">Contact No</span>
                        <br>
                        <span class="border-2 border-zinc-400 rounded-full px-4 block w-full mb-2 font-normal"><?php echo $_SESSION['contactno']; ?></span>
                    </p>

                    <p class="text-lg font-bold">
                        <span class="pl-2">Course</span>
                        <br>
                        <span class="border-2 border-zinc-400 rounded-full px-4 block w-full mb-2 font-normal"><?php echo $_SESSION['course']; ?></span>
                    </p>

                </div>
            </div>

            <div class="p-4 bg-sky-400 fixed bottom-0 w-full font-bold text-lg rounded-tr-[20px] rounded-tl-[20px] border-2 border-black text-white">
                <div class="flex justify-around items-center">
                    <a href="studentpage.php" class="flex flex-col items-center">
                        <img src="./assets/homeButton.png" alt="home" class="rounded-full size-8">
                        <span>Home</span>
                    </a>
                    <a href="activitypage.php" class="flex flex-col items-center">
                        <img src="./assets/activityButton.png" alt="activities" class="rounded-full size-8">
                        <span>Activity</span>
                    </a>
                    <a href="leaderboard.php" class="flex flex-col items-center">
                        <img src="./assets/scoreButton.png" alt="scores" class="rounded-full size-8">
                        <span>Scores</span>
                    </a>
                    <a href="settingpage.php" class="flex flex-col items-center">
                        <img src="./assets/settingsButton.png" alt="settings" class="rounded-full size-8">
                        <span>Settings</span>
                    </a>
                </div>
            </div>
        </div>
    </body>

    </html>

    <!-- JavaScript to handle modal -->
    <script>
        function openEditProfileModal() {
            document.getElementById('editProfileModal').classList.remove('hidden');
        }

        function closeEditProfileModal() {
            document.getElementById('editProfileModal').classList.add('hidden');
        }
    </script>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>