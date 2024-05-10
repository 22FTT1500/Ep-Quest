<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Feedback Form</title>
</head>

<body class="bg-cover bg-repeat bg-center text-white font-sans" style="background-image: url('./assets/background.png');">
    <div class="flex flex-col h-screen">
        <div class="py-6 px-4 bg-sky-400 rounded-br-[15px] rounded-bl-[15px] border-2 border-black">

            <div class="flex items-center justify-between ">
                <div class="flex items-center">
                    <a href="settingpage.php"><img src="./assets/left-arrow.png" alt="profile" class="rounded-full ml-3 size-7" /></a>

                </div>
                <div class="justify-self-center ml-3">
                    <h1 class="font-bold text-xl">Feedback</h1>
                </div>
                <div>
                    <a href="notificationpage.php"><img src="./assets/bell.png" alt="bell" class="rounded-full ml-3 size-7" /></a>

                </div>
            </div>
        </div>

        <div id="feedbackMessage" class="hidden fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 flex justify-center items-center">
            <div class="bg-sky-400 py-8 px-16 rounded-[30px] shadow-md text-center flex flex-col items-center">
                <div>
                    <img src="./assets/feedbackpopup.png" alt="feedback popup" class="size-32">
                </div>
                <p class="text-white font-bold text-lg text-center">Thank you for your feedback!</p>
                <br>
                <button id="closeFeedback" class="w-40 py-2 px-4 border border-transparent rounded-full shadow-sm text-sm font-bold text-white bg-sky-900 hover:bg-sky-600">Ok</button>
            </div>
        </div>

        <?php
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get the form data
            $email = $_POST["email"];
            $message = $_POST["message"];

            // Validate the data (optional)
            // ...

            // Send the feedback data to your email or database
            // ...

            // Show a success message (optional)
            echo "<script>document.getElementById('feedbackMessage').classList.remove('hidden');</script>";
        }
        ?>

        <!-- <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between items-center mb-4">
                <button class="text-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <h1 class="text-xl font-semibold text-center flex-grow">Feedback</h1>
                <button class="text-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8h18M3 16h18M9 4v4m6-4v4m-12 8v4m18-4v4" />
                    </svg>
                </button>
            </div> -->


        <div class="flex flex-col justify-center items-center h-screen">
            <div class="bg-white rounded-[20px] rounded-bl-[50px] border-2 border-black pb-8 py-2 px-2 text-justify text-black" style="width: 400px;">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="space-y-4">
                    <div>
                        <label for="email" class="block text-sm font-bold text-zinc-700 pl-4 pt-4">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" class="mt-1 block w-full px-3 py-2 border border-zinc-500 rounded-full shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-bold text-zinc-700 pl-4">Message</label>
                        <textarea id="message" name="message" rows="4" class="mt-1 block w-full px-3 py-2 border border-zinc-500 rounded-[20px] shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
                    </div>
                    <br>
                    <div class="flex flex-col items-center">
                        <button type="submit" class="w-40 py-2 px-4 border border-transparent rounded-full shadow-sm text-sm font-bold text-white bg-sky-900 hover:bg-sky-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-sky-500">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- </div> -->
    </div>

    <script>
        document.getElementById('closeFeedback').addEventListener('click', function() {
            document.getElementById('feedbackMessage').classList.add('hidden');
        });
    </script>

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

</body>

</html>