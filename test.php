<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <title>About Page</title>

    <style>
        body {
            padding-top: 30vh;
            position: relative;
            /* Added for positioning */
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 40vh;
            background: radial-gradient(circle at center top, #4F1161 50%, transparent 50%);
            z-index: -1;
        }

        /* .logo-container {
            position: absolute;
            top: 5vh;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            z-index: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        } */

        .logo-container img {
            position: relative;
            /* margin-bottom: 1px; */
            /* Adjust the margin as needed */
        }

        .arrow {
            position: fixed;
            top: 10px;
            left: 10px;
        }
    </style>
</head>

<body class="bg-gradient-to-b from-white to-blue-200 h-screen relative">

    <div class="arrow">
        <img src="./assets/left-arrow.png" alt="filter" class="w-10 h-10 sm-only" onclick="window.history.back();">
    </div>

    <div class="logo-container">
        <img src="./assets/token.png" alt="logo" class="logo">
        <h1 class="text-4xl font-bold" style="color: white;">About Page</h1>
    </div>

    <p class="text-center text-l">
        LearnTrack is dedicated to development of high-quality software,
        with the goal of simplifying the learning process for users.
        The platform is designed to be user-friendly, enabling users to track
        their progress and maintain motivation while studying.
    </p>
    <br>
    <p class="text-center text-l">
        Furthermore, LearnTrack is focused on making quality education accessible to
        users regardless of their location or available resources.
        Valuable insights into study habits are offered to help students devise effective learning strategies.
        The guiding principle is to prioritize the user experience,
        ensuring that the app remains accessible to a wide range of users.
    </p>
    <br>
    <p class="text-center text-l">
        Regular updates to the app are made based on user feeback
        and emerging trends in education and technology.
    </p>
    <br>
    <p class="text-center text-l">
        The strategic objective of LearnTrack is to achieve user growth by
        gaining more users through marketing campaigns and user referrals.
        This will be achieved by implementing a user-friendly interface,
        providing regular progress reports, and offering personalized study recommendations.
        The aim is to increase user engagement by at least 50% among registered users.
    </p>

    <!-- Attendance Reg -->
    <div class="fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-75 flex items-center justify-center">
        <div class="bg-white shadow-md overflow-hidden w-96 border-black border-4 rounded-[20px]">
            <!-- Blue background section -->
            <div class="bg-sky-900 p-6 text-white">
                <img src="./assets/correct.png" alt="green tick" class="w-32 h-32 mx-auto mb-4">
                <h2 class="text-lg font-bold text-center">Thank you for joining!</h2>
                <h1 class="text-3xl font-bold text-center">Something Club</h1>
                <br>
                <p class="text-base text-center">Sign In: 17 Oct 2023 / 03:30 PM</p>
            </div>
            <!-- White background section -->
            <div class="bg-white p-6 flex items-center">
                <a href="manageprofile.php">
                    <img src="./assets/user1.jpg" alt="profile" class="rounded-full w-16 h-16 mr-3">
                </a>
                <div class="ml-3">
                    <h2 class="font-bold">Bong Bong Marcus</h2>
                    <p class="text-sm">22FTT1420</p>
                    <p class="text-sm">PIPIN023</p>
                </div>
            </div>
            <!-- "You earned 4 EP points" section -->
            <div class="bg-white mx-4 py-1 px-2 border-2 border-sky-900 rounded-[30px] flex items-center justify-between"> <!-- Added justify-between -->
                <div> <!-- Removed flex-grow -->
                    <p class="text-sm font-semibold">You earned 4 EP points!</p>
                </div>
                <span class="bg-sky-900 text-white rounded-full px-2 py-1">+4</span> <!-- Moved +4 to the right -->
            </div>

            <!-- Button -->
            <div class="px-6 py-4 my-2 flex flex-col items-center">
                <a href="studentpage.php">
                    <button class="rounded-full bg-sky-900 text-white text-base font-semibold py-1 px-4 shadow-md">Back To Home</button>
                </a>
            </div>
        </div>
    </div>



</body>

</html>