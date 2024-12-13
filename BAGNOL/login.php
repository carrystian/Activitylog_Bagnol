<?php
require_once('./Models/User.php');
session_start();

// Initialize variables
$errorMessage = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Attempt login
    $userModel = new User();
    $result = $userModel->login($username, $password);

    if (is_array($result)) {
        // Login successful, store user session
        $_SESSION['user'] = $result;
        header("Location: index.php");
        exit();
    } else {
        $errorMessage = $result;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold text-center mb-4">Login</h1>

        <!-- Error Message -->
        <?php if (!empty($errorMessage)): ?>
            <p class="text-red-500 text-center mb-4">
                <?= htmlspecialchars($errorMessage) ?>
            </p>
        <?php endif; ?>

        <!-- Login Form -->
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
            <button 
                type="submit" 
                class="w-full bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300"
            >
                Login
            </button>
        </form>

        <!-- Registration Link -->
        <p class="mt-4 text-center text-sm text-gray-600">
            Don't have an account? 
            <a href="register.php" class="text-blue-500 hover:underline">Register</a>.
        </p>
    </div>
</body>
</html>

