<?php
require_once __DIR__ . '/../models/UserModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (empty($username) || empty($password) || empty($email)) {
        echo "All fields are required.";
        exit;
    }

    $userModel = new UserModel();

    if ($userModel->exists($username)) {
        echo "Username already taken.";
        exit;
    }

    try {
        $userModel->register($username, $email, $password);
        echo "User registered successfully. <a href='../index.php'>Login here</a>";
    } catch (PDOException $e) {
        echo "Registration failed: " . $e->getMessage();
    }
} else {
    echo "Invalid request method.";
}
