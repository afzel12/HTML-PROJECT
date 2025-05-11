<?php
require_once __DIR__ . '/../db.php';

use Config\Database;

class UserModel {
    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->connect();
    }

    public function register($username, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
        $stmt->bindParam(':name', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->execute();
    }

    public function exists($username) {
        $stmt = $this->pdo->prepare("SELECT id FROM users WHERE name = :name");
        $stmt->bindParam(':name', $username);
        $stmt->execute();
        return $stmt->fetch() !== false;
    }

    public function login($username) {
    $stmt = $this->pdo->prepare("SELECT * FROM users WHERE name = :name");
    $stmt->bindParam(':name', $username);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

}
