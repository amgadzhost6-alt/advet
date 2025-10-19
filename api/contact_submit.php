<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

$name = sanitizeInput($_POST['name'] ?? '');
$email = sanitizeInput($_POST['email'] ?? '');
$phone = sanitizeInput($_POST['phone'] ?? '');
$message = sanitizeInput($_POST['message'] ?? '');

if (empty($name) || empty($email) || empty($phone) || empty($message)) {
    echo json_encode(['success' => false, 'message' => 'Missing required fields']);
    exit;
}

if (!validateEmail($email)) {
    echo json_encode(['success' => false, 'message' => 'Invalid email']);
    exit;
}

$messages = getJsonData('messages.json');

$newMessage = [
    'id' => generateId($messages),
    'date' => date('Y-m-d H:i:s'),
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'message' => $message,
    'read' => false
];

$messages[] = $newMessage;
saveJsonData('messages.json', $messages);

echo json_encode(['success' => true, 'message' => 'Message sent successfully']);
?>
