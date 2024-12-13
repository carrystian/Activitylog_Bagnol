<?php
require_once('./Models/ActivityLog.php');
$userId = $_SESSION['user']['id'];
$activityLog = new ActivityLog();
$recordId = $_POST['id'];

// Handle update form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['saveButton'])) {
    $activityLog->logActivity($userId, 'UPDATE', 'applicants', $recordId, null);
    $formData = [
        'id' => $_POST['id'],
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'email' => $_POST['email'],
        'phone_number' => $_POST['phone_number'],
        'birthdate' => $_POST['birthdate'],
        'gender' => $_POST['gender'],
        'location' => $_POST['location'],
        'years_of_experience' => $_POST['years_of_experience'],
        'education_level' => $_POST['education_level'],
        'field_of_study' => $_POST['field_of_study'],
        'job_title' => $_POST['job_title'],
        'tech_stack' => $_POST['tech_stack'],
        'portfolio_url' => $_POST['portfolio_url'],
        'bio' => $_POST['bio']
    ];

    // Call the update method to save the data
    $applicant->update($formData);
}