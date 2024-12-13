<?php
require_once('./Models/ActivityLog.php');
$userId = $_SESSION['user']['id'];
$activityLog = new ActivityLog();
$recordId = $_POST['id'];

// Handle record deletion
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deleteButton'])) {
    $activityLog->logActivity($userId, 'DELETE', 'applicants', $recordId, null);
    $idToDelete = $_POST['id'];
    $applicant->delete($idToDelete);
}
