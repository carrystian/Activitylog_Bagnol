<?php
require_once('./Models/Applicant.php');

function display_results($searchResults) {
    if (!empty($searchResults)) {
        echo '<h2>Search Results</h2>';
        echo '<table border="1">';
        echo '<tr>';
        echo '<th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th>';
        echo '<th>Phone Number</th><th>Birthdate</th><th>Gender</th><th>Location</th>';
        echo '<th>Experience (Years)</th><th>Education</th><th>Field of Study</th>';
        echo '<th>Job Title</th><th>Tech Stack</th><th>Portfolio</th><th>Bio</th><th>Actions</th>';
        echo '</tr>';
        
        foreach ($searchResults as $user) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($user['id']) . '</td>';
            echo '<td>' . htmlspecialchars($user['first_name']) . '</td>';
            echo '<td>' . htmlspecialchars($user['last_name']) . '</td>';
            echo '<td>' . htmlspecialchars($user['email']) . '</td>';
            echo '<td>' . htmlspecialchars($user['phone_number']) . '</td>';
            echo '<td>' . htmlspecialchars($user['birthdate']) . '</td>';
            echo '<td>' . htmlspecialchars($user['gender']) . '</td>';
            echo '<td>' . htmlspecialchars($user['location']) . '</td>';
            echo '<td>' . htmlspecialchars($user['years_of_experience']) . '</td>';
            echo '<td>' . htmlspecialchars($user['education_level']) . '</td>';
            echo '<td>' . htmlspecialchars($user['field_of_study']) . '</td>';
            echo '<td>' . htmlspecialchars($user['job_title']) . '</td>';
            echo '<td>' . htmlspecialchars($user['tech_stack']) . '</td>';
            echo '<td><a href="' . htmlspecialchars($user['portfolio_url']) . '">Portfolio</a></td>';
            echo '<td>' . htmlspecialchars($user['bio']) . '</td>';
            echo '<td>';
            echo '<form action="index.php" method="POST" style="display:inline;">';
            echo '<input type="hidden" name="id" value="' . htmlspecialchars($user['id']) . '">';
            echo '<input type="submit" name="updateButton" value="Update">';
            echo '</form>';
            echo '<form action="index.php" method="POST" style="display:inline;">';
            echo '<input type="hidden" name="id" value="' . htmlspecialchars($user['id']) . '">';
            echo '<input type="submit" name="deleteButton" value="Delete" onclick="return confirm(\'Are you sure?\');">';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }
        
        echo '</table>';
    } else {
        $applicant = new Applicant();
        $applicant->show(); // Display all records
    }
}
?>
