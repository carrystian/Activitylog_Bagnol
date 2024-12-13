<?php

// Redirect based on login status
function check_authentication() {
    $currentFile = basename($_SERVER['PHP_SELF']);

    if (isset($_SESSION['user'])) {
        if ($currentFile === 'login.php' || $currentFile === 'register.php') {
            header("Location: index.php");
            exit();
        }
    } else {
        if ($currentFile === 'index.php') {
            header("Location: login.php");
            exit();
        }
    }
}

// Call this function in every file that needs authentication
check_authentication();
?>
