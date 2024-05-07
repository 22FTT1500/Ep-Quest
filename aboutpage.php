<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body class="bg-zinc-900 text-white font-sans">

    <div class="flex flex-col h-screen">
        <div class="p-4 bg-blue-900">
            <!-- Profile Link -->
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <a href="settingpage.php"><img src="./assets/left-arrow.png" alt="profile" class="rounded-full ml-3 size-7" /></a>
                    <!-- add center title -->
                </div>
                <div class="justify-self-center ml-3">
                    <h1 class="font-bold">Manage Profile</h1>
                </div>
                <div>
                    <img src="./assets/bell.png" alt="profile" class="rounded-full ml-3 size-7" />
                </div>
            </div>
        </div>
        <div class="flex flex-col items-center">
            <div class="bg-white rounded-full p-2 border-2 border-blue-500 mb-4">
                <img src="assets/EpQuestLogo.png" alt="EP Quest Logo">
            </div>
            <h2 class="text-2xl font-bold text-blue-500">Ep-Quest</h2>
        </div>
        <div class="mt-4">
            <h3 class="text-lg font-semibold">About Us</h3>
            <p class="text-sm">
                EP Quest is a student app for tracking enrichment points, allowing students to earn points for educational tasks and activities. This solution helps schools reduce inventory losses by allowing students to check their current points without waiting for the next semester.
            </p>
        </div>
        <div class="mt-4">
            <h3 class="text-lg font-semibold">Mission</h3>
            <p class="text-sm">
                EP Quest aims to motivate college students to take charge of their educational lives and become active, stimulated competitors.
            </p>
        </div>
        <div class="mt-4 mb-4">
            <h3 class="text-lg font-semibold">Vision</h3>
            <p class="text-sm">
                EP Quest is a student point tracking app created for improving student engagement and motivation in educational settings.
            </p>
        </div>
        <div class="flex justify-center items-center">
            <button class="text-blue-500">&#x2715;</button>
        </div>
        <div class="fixed bottom-0 left-0 right-0 bg-zinc-900 p-4 text-center">
            <p>Contact Us: +673 2020900</p>
        </div>
    </div>

</body>

</html>