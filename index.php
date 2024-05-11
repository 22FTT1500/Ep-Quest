<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>EP-QUEST</title>
</head>

<body class="bg-cover bg-repeat bg-center text-white font-sans" style="background-image: url('./assets/background.png');">
    <div class="py-6 px-4 pb-32 bg-sky-400 rounded-br-[50px] rounded-bl-[50px] border-2 border-black flex flex-col items-center">

        <img src="./assets/EpQuestLogo.png" alt="Logo" class="size-48 logo">

        <h1 class="text-4xl font-bold">Ep-Quest</h1>

    </div>
    <div class="flex flex-col py-10 items-center justify-center">
        <form action="login.php" method="post" class="space-y-6">
            <?php if (isset($_GET['error'])) { ?>
                <p class="text-red-500 text-center"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <div class="relative w-80">
                <input type="text" name="stuid" placeholder="Student ID" class="pl-10 pr-4 py-4 text-xl w-full border rounded-full text-zinc-900 focus:outline-none focus:border-blue-500 shadow-lg">
                <span class="absolute left-3 top-2 text-zinc-500">
                    <!-- <img src="https://placehold.co/20x20" alt="Logo" class="mb-2"> -->
                </span>
            </div>
            <div class="relative">
                <input type="password" name="password" placeholder="Password" class="pl-10 pr-4 py-4 text-xl w-full border rounded-full text-zinc-900 focus:outline-none focus:border-blue-500 shadow-lg">
                <span class="absolute left-3 top-2 text-zinc-500">
                    <!-- <img src="https://placehold.co/20x20" alt="Logo" class="mb-2"> -->
                </span>
            </div>
            <br>
            <div class="flex justify-center">
                <button type="submit" class="w-40 bg-sky-900 text-white text-xl font-bold p-2 rounded-full">Sign In</button>
            </div>
        </form>

    </div>

</body>

</html>