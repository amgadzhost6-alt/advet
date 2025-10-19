<?php
header('Content-Type: application/json');
require_once __DIR__ . '/../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

$productId = intval($_POST['product_id'] ?? 0);
$name = sanitizeInput($_POST['name'] ?? '');
$email = sanitizeInput($_POST['email'] ?? '');
$phone = sanitizeInput($_POST['phone'] ?? '');
$quantity = intval($_POST['quantity'] ?? 0);
$notes = sanitizeInput($_POST['notes'] ?? '');

if (empty($name) || empty($email) || empty($phone) || $quantity < 1) {
    echo json_encode(['success' => false, 'message' => 'Missing required fields']);
    exit;
}

if (!validateEmail($email)) {
    echo json_encode(['success' => false, 'message' => 'Invalid email']);
    exit;
}

$quotations = getJsonData('quotations.json');

$newQuotation = [
    'id' => generateId($quotations),
    'date' => date('Y-m-d H:i:s'),
    'customer' => [
        'name' => $name,
        'email' => $email,
        'phone' => $phone
    ],
    'product_id' => $productId,
    'quantity' => $quantity,
    'notes' => $notes,
    'status' => 'new'
];

$quotations[] = $newQuotation;
saveJsonData('quotations.json', $quotations);

echo json_encode(['success' => true, 'message' => 'Quotation submitted successfully']);
?>
