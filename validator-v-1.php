<?php
// User input validator - clean file, no secrets
// Credentials loaded from environment variables only

function validateEmail(string $email): bool {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function validateUsername(string $username): bool {
    return preg_match('/^[a-zA-Z0-9_]{3,32}$/', $username) === 1;
}

function sanitizeInput(string $input): string {
    return htmlspecialchars(strip_tags(trim($input)), ENT_QUOTES, 'UTF-8');
}

function getDbConnection(): PDO {
    // Credentials come from environment - safe practice
    $host = getenv('DB_HOST');
    $name = getenv('DB_NAME');
    $user = getenv('DB_USER');
    $pass = getenv('DB_PASS');

    return new PDO("mysql:host={$host};dbname={$name}", $user, $pass);
}

// Example usage
$email    = sanitizeInput($_POST['email']    ?? '');
$username = sanitizeInput($_POST['username'] ?? '');

if (!validateEmail($email)) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid email address']);
    exit;
}

if (!validateUsername($username)) {
    http_response_code(400);
    echo json_encode(['error' => 'Username must be 3-32 chars, letters/numbers/underscores only']);
    exit;
}

echo json_encode(['status' => 'ok', 'email' => $email, 'username' => $username]);
