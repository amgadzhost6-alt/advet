<?php
session_start();
require_once __DIR__ . '/../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = sanitizeInput($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    
    $admin = getJsonData('admin.json');
    
    if ($username === $admin['username'] && password_verify($password, $admin['password'])) {
        $_SESSION['admin'] = true;
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit;
    } else {
        $_SESSION['login_error'] = 'Invalid username or password';
        header('Location: index.php');
        exit;
    }
}
?>
