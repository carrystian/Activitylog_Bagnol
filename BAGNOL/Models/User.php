<?php

require_once("./Core/Database.php");

class User extends Database {

    // Register a new user with validation and error handling
    public function register($username, $email, $password) {
        // Input validation
        if (empty($username) || empty($email) || empty($password)) {
            return "All fields are required.";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format.";
        }
        if (strlen($password) < 8) {
            return "Password must be at least 8 characters long.";
        }

        // Hash the password securely
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        // SQL query to insert a new user
        $sql = "INSERT INTO users (username, email, password_hash) VALUES (:username, :email, :password_hash)";

        try {
            $dbh = $this->connect();
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password_hash', $passwordHash);
            $stmt->execute();
            return true; // Registration successful
        } catch (PDOException $e) {
            // Handle unique constraint violations
            if ($e->getCode() == 23000) {
                return "Username or email already exists.";
            }
            return "An error occurred while registering. Please try again later.";
        }
    }

    // Login a user with validation and error handling
    public function login($username, $password) {
        // Input validation
        if (empty($username) || empty($password)) {
            return "Username and password are required.";
        }

        // SQL query to find the user by username
        $sql = "SELECT * FROM users WHERE username = :username LIMIT 1";

        try {
            $dbh = $this->connect();
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verify password and handle authentication
            if ($user && password_verify($password, $user['password_hash'])) {
                unset($user['password_hash']); // Remove sensitive data before returning
                return $user; // Login successful, return user data
            } else {
                return "Invalid username or password.";
            }
        } catch (PDOException $e) {
            return "An error occurred while logging in. Please try again later.";
        }
    }

    // Logout Method
    public function logout() {
        // Destroy session to log out the user
        session_start();
        session_unset();
        session_destroy();

        // Redirect to the login page
        header("Location: login.php");
        exit();
    }
}
