<div class="max-w-sm mx-auto bg-white rounded-lg shadow-md overflow-hidden">
    <div class="bg-blue-600 p-5 text-center text-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <h1 class="text-lg font-semibold">Thank You for joining!</h1>
        <h2 class="text-2xl font-bold">HANDBALL CLUB</h2>
        <p class="text-sm"><?php echo $_SESSION['sign_in_date']; ?></p>
    </div>
    <div class="p-5">
        <div class="flex items-center space-x-3 mb-5">
            <img src="<?php echo $_SESSION['profileimg']; ?>" alt="Profile Picture" class="rounded-full">
            <div>
                <p class="text-sm font-semibold"><?php echo $_SESSION['fullname']; ?></p>
                <p class="text-xs text-zinc-500"><?php echo $_SESSION['student_id']; ?></p>
                <p class="text-xs text-zinc-500">DWDT08</p>
            </div>
        </div>
        <div class="bg-zinc-100 p-3 rounded-lg flex items-center justify-between">
            <p class="text-sm">You earned <?php echo $_SESSION['club_point']; ?> EP points</p>
            <button class="text-blue-600 text-sm font-semibold bg-blue-100 rounded-full px-4 py-1">+4</button>
        </div>
    </div>
    <div class="px-5 py-4 bg-zinc-50 text-center">
        <button class="bg-blue-600 text-white rounded-lg px-4 py-2">Back To Home</button>
    </div>
</div>