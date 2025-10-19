<?php
session_start();
header('Content-Type: application/json');
require_once __DIR__ . '/../includes/functions.php';

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

$settings = [
    'company' => sanitizeInput($_POST['company'] ?? ''),
    'email' => sanitizeInput($_POST['email'] ?? ''),
    'phone' => sanitizeInput($_POST['phone'] ?? ''),
    'address' => sanitizeInput($_POST['address'] ?? ''),
    'social' => [
        'facebook' => sanitizeInput($_POST['facebook'] ?? ''),
        'instagram' => sanitizeInput($_POST['instagram'] ?? ''),
        'whatsapp' => sanitizeInput($_POST['whatsapp'] ?? ''),
        'linkedin' => sanitizeInput($_POST['linkedin'] ?? '')
    ]
];

saveJsonData('settings.json', $settings);

echo json_encode(['success' => true, 'message' => 'Settings updated successfully']);
?>
