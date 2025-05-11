<?php
require_once __DIR__ . '/db.php';

session_start();

if (isset($_SESSION['user_id'])) {
    echo "Welcome, " . htmlspecialchars($_SESSION['username']) . "! <a href='logout.php'>Logout</a>";
} else {
    header("Location: views/login.php");
    exit;
}
