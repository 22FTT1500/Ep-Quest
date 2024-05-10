 <?php
    session_start();
    include 'db_conn.php';

    if (
        isset($_SESSION['student_id']) && isset($_SESSION['fullname'])
        && isset($_SESSION['email']) && isset($_SESSION['grpcode'])
        && isset($_SESSION['contactno']) && isset($_SESSION['course']) && isset($_SESSION['profileimg'])
    ) {
    ?>

     <!DOCTYPE html>
     <html lang="en">

     <head>
         <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Document</title>
         <script src="https://cdn.tailwindcss.com"></script>
     </head>

     <!-- Header -->

     <body class="bg-cover bg-repeat bg-center text-white font-sans" style="background-image: url('./assets/background.png');">
         <div class="flex flex-col h-screen">
             <div class="py-6 px-4 bg-sky-400 rounded-br-[30px] rounded-bl-[30px] border-2 border-black">

                 <div class="flex items-center justify-between ">
                     <div class="flex items-center">
                         <a href="settingpage.php"><img src="./assets/left-arrow.png" alt="profile" class="rounded-full ml-3 size-7" /></a>

                     </div>
                     <div class="justify-self-center ml-3">
                         <h1 class="font-bold text-xl">Notification</h1>
                     </div>
                     <div>
                         <a href="notificationpage.php"><img src="./assets/bell.png" alt="bell" class="rounded-full ml-3 size-7" /></a>
                     </div>
                 </div>
             </div>

             <!-- Content -->
             <div class="my-4 mx-4">
                 <div class="bg-white text-black p-4 shadow rounded-lg border-2 border-black mb-4 flex">
                     <img src="./assets/bubble-chat.png" alt="notif" class="scale-x-[-1] size-10">
                     <div class="ml-4 overflow-hidden">
                         <h2 class="text-lg font-bold">Join Movie Club Now 🍿</h2>
                         <p class="whitespace-nowrap">14/02/2024 10:30 AM</p>
                     </div>
                 </div>
                 <div class="bg-white text-black p-4 shadow rounded-lg border-2 border-black mb-4 flex">
                     <img src="./assets/bubble-chat.png" alt="notif" class="scale-x-[-1] size-10">
                     <div class="ml-4 overflow-hidden">
                         <h2 class="text-lg font-bold">PUBGM AND VALORANT TOURNAMENT</h2>
                         <p class="whitespace-nowrap">14/02/2024 10:30 AM</p>
                     </div>
                 </div>
                 <div class="bg-white text-black p-4 shadow rounded-lg border-2 border-black mb-4 flex">
                     <img src="./assets/bubble-chat.png" alt="notif" class="scale-x-[-1] size-10">
                     <div class="ml-4 overflow-hidden">
                         <h2 class="text-lg font-bold">HANDBALL CLUB OFFERS 3K HOLY !!!</h2>
                         <p class="whitespace-nowrap">14/02/2024 10:30 AM</p>
                     </div>
                 </div>
             </div>

             <!-- Footer -->
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

 <?php
    } else {
        header("Location: index.php");
        exit();
    }
    ?>