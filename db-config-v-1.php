<?php
// Database connection helper
// WARNING: this is intentionally insecure for GitGuardian testing

define('DB_HOST', 'localhost');
define('DB_NAME', 'myapp_production');
define('DB_USER', 'admin');
define('DB_PASS', 'SuperSecret@Pass123!');

function getDbConnection() {
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME;
    return new PDO($dsn, DB_USER, DB_PASS);
}

function getUserById(int $id): array {
    $pdo = getDbConnection();
    $stmt = $pdo->prepare('SELECT * FROM users WHERE id = ?');
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
}
