<?php
session_start();
require_once('./Models/Applicant.php');
require_once('./Models/User.php');
require_once('./handlers/handle_auth.php');
require_once('./Models/ActivityLog.php');

// Instantiate Applicant class
$applicant = new Applicant();
$activityLog = new ActivityLog();

// Default view is to show the table
$view = 'show';

// Check if a user is logged in
if (isset($_SESSION['user'])) {
    // Create a User object
    $user = new User();

    // If the logout button is clicked, call the logout method
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['logoutButton'])) {
        $user->logout();
    }
} else {
    // If not logged in, redirect to login page
    header("Location: login.php");
    exit();
}

// Handle view switching
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['registerButton'])) {
        require('./create_applicant_form.php');
    } elseif (isset($_POST['storeApplicantButton'])) {
        require('./handlers/handle_create.php');
    } elseif (isset($_POST['updateButton'])) {
        $userDetails = $applicant->getUserById($_POST['id']);
        require('./update_applicant_form.php');
    } elseif (isset($_POST['deleteButton'])) {
        require('./handlers/handle_delete.php');
    } elseif (isset($_POST['saveButton'])) {
        require('./handlers/handle_update.php');
    } elseif (isset($_POST['viewLogsButton'])) {
        // Redirect to activity log page when button is clicked
        header("Location: activity_logs.php");
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['search'])) {
    $searchResults = $applicant->search($_GET['search']);
} else {
    $searchResults = $applicant->show(); // Fetch all applicants
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Software Engineer Application</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
    <!-- Navbar -->
    <header class="bg-white shadow-sm">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <h1 class="text-xl font-bold">Software Engineer Application</h1>
            <form action="index.php" method="POST">
                <button name="logoutButton" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                    Logout
                </button>
            </form>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-6">
        <!-- Register Applicant Button -->
        <form action="index.php" method="POST" class="mb-4">
            <button name="registerButton" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Register an Applicant
            </button>
        </form>

        <!-- View Activity Log Button -->
        <form action="index.php" method="POST" class="mb-4">
            <button name="viewLogsButton" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                View Activity Log
            </button>
        </form>

        <!-- Search Form -->
        <form action="index.php" method="GET" class="mb-6">
            <div class="flex items-center">
                <input 
                    type="text" 
                    id="search" 
                    name="search" 
                    placeholder="Search here..." 
                    class="flex-1 px-4 py-2 border border-gray-300 rounded-l focus:outline-none focus:ring focus:ring-blue-300"
                />
                <button 
                    type="submit" 
                    class="bg-blue-500 text-white px-4 py-2 rounded-r hover:bg-blue-600">
                    Search
                </button>
            </div>
        </form>

        <!-- Applicants Table or Create Form -->
        <div class="mb-6">
            <?php if ($view === 'show'): ?>
                <!-- Applicants Table -->
                <div class="overflow-x-auto">
                    <table class="w-full table-auto border-collapse border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">ID</th>
                                <th class="border border-gray-300 px-4 py-2">First Name</th>
                                <th class="border border-gray-300 px-4 py-2">Last Name</th>
                                <th class="border border-gray-300 px-4 py-2">Email</th>
                                <th class="border border-gray-300 px-4 py-2">Phone</th>
                                <th class="border border-gray-300 px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($searchResults as $user): ?>
                                <tr class="odd:bg-white even:bg-gray-50">
                                    <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($user['id']) ?></td>
                                    <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($user['first_name']) ?></td>
                                    <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($user['last_name']) ?></td>
                                    <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($user['email']) ?></td>
                                    <td class="border border-gray-300 px-4 py-2"><?= htmlspecialchars($user['phone_number']) ?></td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <form action="index.php" method="POST" class="inline">
                                            <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
                                            <button name="updateButton" class="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600">
                                                Update
                                            </button>
                                        </form>
                                        <form action="index.php" method="POST" class="inline">
                                            <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
                                            <button name="deleteButton" onclick="return confirm('Are you sure?');" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
