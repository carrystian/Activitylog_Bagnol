<?php
require_once('./Models/Applicant.php');
require_once('./handlers/handle_auth.php');
session_start();

$applicant = new Applicant();

// Handle form submission when the "Register" button is pressed
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['storeApplicantButton'])) {

    // Collect form data
    $formData = [
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

    // Get the current user ID (assuming the user is logged in)
    $userId = $_SESSION['user']['id'];

    // Call the store method to insert the applicant data into the database
    $applicant->store($formData);

    // Redirect to the homepage (or another page) after successful creation
    header('Location: index.php');
    exit();
}
?>
