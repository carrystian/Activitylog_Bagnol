<?php
require_once('./Models/Applicant.php');

$applicant = new Applicant();

// Handle record deletion
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deleteButton'])) {
    $idToDelete = $_POST['id'];
    $applicant->delete($idToDelete);
}

// Handle update form display
$userDetails = null;
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateButton'])) {
    $applicantId = $_POST['id'];
    $userDetails = $applicant->getUserById($applicantId); // Fetch the user details by ID
}

// Handle update form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['saveButton'])) {
    $formData = $_POST;
    $applicant->update($formData);
}

// Handle Application form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['storeApplicantButton'])) {
    $formData = $_POST;
    $applicant->store($formData);
}
?>
