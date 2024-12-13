<?php
require_once('./Models/User.php');
session_start();

// Initialize variables
$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirmPassword) {
        $errorMessage = "Passwords do not match.";
    } else {
        // Attempt registration
        $userModel = new User();
        $result = $userModel->register($username, $email, $password);

        if ($result === true) {
            $successMessage = "Registration successful!";
        } else {
            $errorMessage = $result;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold text-center mb-4">Register</h1>

        <!-- Error Message -->
        <?php if (!empty($errorMessage)): ?>
            <p class="text-red-500 text-center mb-4">
                <?= htmlspecialchars($errorMessage) ?>
            </p>
        <?php endif; ?>

        <!-- Success Message -->
        <?php if (!empty($successMessage)): ?>
            <p class="text-green-500 text-center mb-4">
                <?= htmlspecialchars($successMessage) ?>
            </p>
        <?php endif; ?>

        <!-- Registration Form -->
        <form method="POST" class="space-y-4">
            <div>
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input 
                    type="text" 
                    name="username" 
                    id="username" 
                    placeholder="Username" 
                    required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300"
                />
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    placeholder="Email" 
                    required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300"
                />
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input 
                    type="password" 
                    name="password" 
                    id="password" 
                    placeholder="Password" 
                    required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300"
                />
            </div>
            <div>
                <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input 
                    type="password" 
                    name="confirm_password" 
                    id="confirm_password" 
                    placeholder="Confirm Password" 
                    required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300"
                />
            </div>
            <button 
                type="submit" 
                class="w-full bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300"
            >
                Register
            </button>
        </form>

        <!-- Login Link -->
        <p class="mt-4 text-center text-sm text-gray-600">
            Already have an account? 
            <a href="login.php" class="text-blue-500 hover:underline">Login</a>.
        </p>
    </div>
</body>
</html>

