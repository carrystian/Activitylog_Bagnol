<?php
require_once('./Models/ActivityLog.php');
require_once('./handlers/handle_auth.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$activityLog = new ActivityLog();
$logs = $activityLog->getAllLogs(); // Fetch logs
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Logs</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans min-h-screen flex items-center justify-center">
    <div class="w-full max-w-6xl bg-white p-6 rounded shadow-md">
        <h1 class="text-2xl font-bold text-center mb-6">Activity Logs</h1>
        <div class="text-right mb-4">
            <a href="index.php" class="text-blue-500 hover:underline">Back to Home</a>
        </div>
        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="px-4 py-2 border border-gray-300">ID</th>
                        <th class="px-4 py-2 border border-gray-300">User Email</th>
                        <th class="px-4 py-2 border border-gray-300">Action Type</th>
                        <th class="px-4 py-2 border border-gray-300">Table Name</th>
                        <th class="px-4 py-2 border border-gray-300">Record ID</th>
                        <th class="px-4 py-2 border border-gray-300">Search Keywords</th>
                        <th class="px-4 py-2 border border-gray-300">Timestamp</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($logs as $log): ?>
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2 border border-gray-300"><?= htmlspecialchars($log['id']) ?? 'NA' ?></td>
                            <td class="px-4 py-2 border border-gray-300">
                                <?= htmlspecialchars($activityLog->getUserEmail($log['user_id'])) ?? 'NA' ?>
                            </td>
                            <td class="px-4 py-2 border border-gray-300"><?= htmlspecialchars($log['action_type']) ?? 'NA' ?></td>
                            <td class="px-4 py-2 border border-gray-300"><?= htmlspecialchars($log['table_name']) ?? 'NA' ?></td>
                            <td class="px-4 py-2 border border-gray-300"><?= htmlspecialchars($log['record_id']) ?? 'NA' ?></td>
                            <td class="px-4 py-2 border border-gray-300"><?= htmlspecialchars($log['search_keywords']) ?? 'NA' ?></td>
                            <td class="px-4 py-2 border border-gray-300"><?= htmlspecialchars($log['action_timestamp']) ?? 'NA' ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
