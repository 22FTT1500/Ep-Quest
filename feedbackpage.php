<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Feedback Form</title>
</head>

<body class="bg-blue-100 min-h-screen flex items-center justify-center p-4">
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
        echo "<p class='text-green-500 text-center'>Thank you for your feedback!</p>";
    }
    ?>
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-6">
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
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="space-y-4">
            <div>
                <label for="email" class="block text-sm font-medium text-zinc-700">Email</label>
                <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" class="mt-1 block w-full px-3 py-2 border border-zinc-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" />
            </div>
            <div>
                <label for="message" class="block text-sm font-medium text-zinc-700">Message</label>
                <textarea id="message" name="message" rows="4" class="mt-1 block w-full px-3 py-2 border border-zinc-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"></textarea>
            </div>
            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Submit
            </button>
        </form>
    </div>
</body>

</html>