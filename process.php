<?php
// process.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        exit("Username and password are required.");
    }

    // Hash password so it's secure
    $hashed = password_hash($password, PASSWORD_DEFAULT);

    // Prepare text entry
    $entry = "Username: {$username}\nPassword Hash: {$hashed}\n----\n";

    // Save to file
    file_put_contents("logins.txt", $entry, FILE_APPEND | LOCK_EX);

    echo "Saved securely.";
} else {
    echo "Invalid request.";
}
?>
