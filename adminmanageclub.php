<?php
session_start();
include 'db_conn.php';

// Check if the user is an admin
if (isset($_SESSION['student_id']) && isset($_SESSION['fullname']) && isset($_SESSION['profileimg']) && isset($_SESSION['is_admin']) && $_SESSION['is_admin']) {
    // Retrieve all clubs from the database
    $sqlClubs = "SELECT * FROM clubs";
    $resultClubs = mysqli_query($conn, $sqlClubs);

    // Retrieve all events from the database
    $sqlEvents = "SELECT * FROM events";
    $resultEvents = mysqli_query($conn, $sqlEvents);

    // Process search query
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $sqlSearchClubs = "SELECT * FROM clubs WHERE ClubName LIKE '%$search%'";
        $sqlSearchEvents = "SELECT * FROM events WHERE EventName LIKE '%$search%'";

        // Execute queries for clubs and events
        $resultClubs = mysqli_query($conn, $sqlSearchClubs);
        $resultEvents = mysqli_query($conn, $sqlSearchEvents);
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>Activity Page</title>
    </head>

    <body class="bg-cover bg-repeat bg-center text-black font-sans" style="background-image: url('./assets/background.png');">
        <div class="flex flex-col">
            <!-- Header -->
            <div class="py-6 px-4 bg-sky-400 rounded-br-[30px] rounded-bl-[30px] border-2 border-black">
                <div class="flex items-center justify-between">
                    <a href="adminpage.php">
                        <img src="./assets/left-arrow.png" alt="profile" class="rounded-full ml-3 size-7" />
                    </a>
                    <div class="justify-self-center ml-3 text-white">
                        <h1 class="font-bold text-xl">Detail</h1>
                    </div>
                    <div>
                        <!-- No link for admin -->
                        <img src="./assets/bell.png" alt="profile" class="rounded-full ml-3 size-7" />
                    </div>
                </div>
            </div>

            <!-- Search box -->
            <div class="m-4 rounded-full text-center">
                <form method="GET" action="" class="flex items-center p-2 bg-sky-900 shadow-md rounded-full">
                    <input type="text" name="search" placeholder="Search Clubs or Events..." class="flex-grow p-2 pl-4 border border-zinc-300 rounded-full">
                    <button type="submit" class="p-2 bg-sky-900 text-white rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0zM21 21l-4.35-4.35"></path>
                        </svg>
                    </button>
                </form>
            </div>

            <!-- Add Club Popup Button -->
            <button onclick="toggleAddClubPopup()" class="bg-green-500 text-white px-4 py-2 rounded-full mb-3">Add Club</button>

            <!-- Add Event Popup Button -->
            <!-- <button onclick="toggleAddEventPopup()" class="bg-green-500 text-white px-4 py-2 rounded-full">Add Event</button> -->

            <!-- Add Club Popup -->
            <div id="addClubPopup" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
                <div class="bg-white p-6 rounded-lg">
                    <h2 class="text-lg font-semibold mb-4">Add Club</h2>
                    <form id="addClubForm" action="add_club.php" method="POST" enctype="multipart/form-data">
                        <!-- Club Name -->
                        <input type="text" name="club_name" placeholder="Club Name" class="block w-full border-gray-300 rounded-md mb-2">

                        <!-- Description -->
                        <textarea name="description" placeholder="Description" class="block w-full border-gray-300 rounded-md mb-2"></textarea>

                        <!-- Club Manager -->
                        <input type="text" name="club_manager" placeholder="Club Manager" class="block w-full border-gray-300 rounded-md mb-2">

                        <!-- Sessions -->
                        <input type="text" name="sessions" placeholder="Sessions" class="block w-full border-gray-300 rounded-md mb-2">

                        <!-- Club Point -->
                        <input type="number" name="club_point" placeholder="Club Point" class="block w-full border-gray-300 rounded-md mb-2">

                        <!-- Img Banner -->
                        <input type="file" name="img_banner" class="block w-full border-gray-300 rounded-md mb-2">

                        <!-- Add more fields here if needed -->
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-full">Add Club</button>
                        <button type="button" onclick="toggleAddClubPopup()" class="bg-red-500 text-white px-4 py-2 rounded-full ml-2">Cancel</button>
                    </form>
                </div>
            </div>


            <!-- Add Event Popup -->
            <div id="addEventPopup" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
                <div class="bg-white p-6 rounded-lg">
                    <h2 class="text-lg font-semibold mb-4">Add Event</h2>
                    <form id="addEventForm">
                        <!-- Add fields for event details -->
                        <input type="text" name="event_name" placeholder="Event Name" class="block w-full border-gray-300 rounded-md mb-2">
                        <!-- Add more fields here if needed -->
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-full">Add Event</button>
                        <button type="button" onclick="toggleAddEventPopup()" class="bg-red-500 text-white px-4 py-2 rounded-full ml-2">Cancel</button>
                    </form>
                </div>
            </div>

            <!-- Activity cards for each club -->
            <div class="mx-4 my-5">
                <?php
                // Display clubs
                if (isset($resultClubs)) {
                    while ($clubRow = mysqli_fetch_assoc($resultClubs)) {
                ?>
                        <div class="bg-white dark:bg-zinc-800 shadow-lg rounded-[30px] overflow-hidden mb-4">
                            <img src="<?php echo $clubRow['ImgBanner']; ?>" alt="<?php echo $clubRow['ClubName']; ?>" class="w-full h-48 sm:h-64 object-cover">
                            <div class="p-4">
                                <div class="flex justify-center items-center">
                                    <h2 class="text-lg font-semibold dark:text-white"><?php echo $clubRow['ClubName']; ?></h2>
                                    <!-- Add delete button -->
                                    <button onclick="confirmDeleteClub('<?php echo $clubRow['ClubID']; ?>')" class="text-red-500 ml-2">Delete</button>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                }

                // Display events
                if (isset($resultEvents)) {
                    while ($eventRow = mysqli_fetch_assoc($resultEvents)) {
                    ?>
                        <div class="bg-white dark:bg-zinc-800 shadow-lg rounded-[30px] overflow-hidden mb-7">
                            <img src="<?php echo $eventRow['ImgBanner']; ?>" alt="<?php echo $eventRow['EventName']; ?>" class="w-full h-48 sm:h-64 object-cover">
                            <div class="p-4">
                                <div class="flex justify-center items-center">
                                    <h2 class="text-lg font-semibold dark:text-white"><?php echo $eventRow['EventName']; ?></h2>
                                    <!-- Add delete button -->
                                    <button onclick="confirmDeleteEvent('<?php echo $eventRow['EventID']; ?>')" class="text-red-500 ml-2">Delete</button>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>

            <br>
            <br>

            <!-- Footer -->
            <div class="p-4 bg-sky-400 fixed bottom-0 w-full font-bold text-lg rounded-tr-[20px] rounded-tl-[20px] border-2 border-black text-white">
                <div class="flex justify-around items-center">
                    <!-- Add footer content here -->
                </div>
            </div>
        </div>

        <script>
            // Function to toggle add club popup
            function toggleAddClubPopup() {
                document.getElementById('addClubPopup').classList.toggle('hidden');
            }

            // Function to toggle add event popup
            function toggleAddEventPopup() {
                document.getElementById('addEventPopup').classList.toggle('hidden');
            }

            // Function to confirm club deletion
            function confirmDeleteClub(clubId) {
                if (confirm("Are you sure you want to delete this club?")) {
                    // Perform AJAX request to delete club
                    fetch('delete_club.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: 'club_id=' + clubId,
                        })
                        .then(response => response.text())
                        .then(data => {
                            // Handle response as needed
                            console.log(data);
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('An error occurred. Please try again.');
                        });
                }
            }

            // Function to confirm event deletion
            function confirmDeleteEvent(eventId) {
                if (confirm("Are you sure you want to delete this event?")) {
                    // Perform AJAX request to delete event
                    fetch('delete_event.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: 'event_id=' + eventId,
                        })
                        .then(response => response.text())
                        .then(data => {
                            // Handle response as needed
                            console.log(data);
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('An error occurred. Please try again.');
                        });
                }
            }
        </script>
    </body>

    </html>

<?php
} else {
    header("Location: index.php");
    exit();
}
?>