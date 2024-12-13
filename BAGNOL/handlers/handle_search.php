<?php
require_once('./Models/Applicant.php');

$applicant = new Applicant();
$searchResults = [];

// Handle search
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['search'])) {
    $searchQuery = $_GET['search'];
    $searchResults = $applicant->search($searchQuery);
}
?>
