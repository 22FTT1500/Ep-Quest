<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body class="bg-cover bg-repeat bg-center text-white font-sans" style="background-image: url('./assets/background.png');">

    <div class="flex flex-col h-screen">
        <div class="py-6 px-4 bg-sky-400 rounded-br-[15px] rounded-bl-[15px] border-2 border-black">
            <!-- Profile Link -->
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <a href="settingpage.php"><img src="./assets/left-arrow.png" alt="profile" class="rounded-full ml-3 size-7" /></a>
                    <!-- add center title -->
                </div>
                <div class="justify-self-center ml-3 text-white text-xl">
                    <h1 class="font-bold">About Us</h1>
                </div>
                <div>
                    <img src="./assets/bell.png" alt="profile" class="rounded-full ml-3 size-7" />
                </div>
            </div>
        </div>
        <div class="flex flex-col items-center p-4">
            <div>
                <img src="assets/EpQuestLogo.png" alt="EP Quest Logo" class="size-48">
            </div>
            <h2 class="text-2xl font-serif font-bold text-white bg-sky-400 rounded-full py-2 px-8">Ep-Quest</h2>
        </div>
        <div class="py-2 px-6">
            <div class="bg-white rounded-[20px] rounded-bl-[50px] border-2 border-black pb-8 py-2 px-2 flex flex-col text-justify">
                <div class="mt-4 text-black">
                    <h3 class="text-xl font-semibold pb-2">About Us</h3>
                    <p class="text-sm text-slate-500">
                        EP Quest is a student app for tracking enrichment points, allowing students to earn points for educational tasks and activities. This solution helps schools reduce inventory losses by allowing students to check their current points without waiting for the next semester.
                    </p>
                </div>
                <div class="mt-4 text-black">
                    <h3 class="text-xl font-semibold pb-2">Mission</h3>
                    <p class="text-sm text-slate-500">
                        EP Quest aims to motivate college students to take charge of their educational lives and become active, stimulated competitors.
                    </p>
                </div>
                <div class="mt-4 mb-4 text-black">
                    <h3 class="text-xl font-semibold pb-2">Vision</h3>
                    <p class="text-sm text-slate-500">
                        EP Quest is a student point tracking app created for improving student engagement and motivation in educational settings.
                    </p>
                </div>
            </div>
        </div>
        <!-- <div class="flex justify-center items-center">
            <button class="text-blue-500">&#x2715;</button>
        </div> -->
        <div class=" bg-sky-400 rounded-tr-[15px] rounded-tl-[15px] border-2 border-black font-bold fixed bottom-0 left-0 right-0 p-4 text-center">
            <p>Contact Us: +673 2020900</p>
        </div>
    </div>

</body>

</html>