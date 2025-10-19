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

$id = intval($_POST['id'] ?? 0);
$products = getJsonData('products.json');

$products = array_filter($products, function($product) use ($id) {
    return $product['id'] !== $id;
});

$products = array_values($products);
saveJsonData('products.json', $products);

echo json_encode(['success' => true, 'message' => 'Product deleted successfully']);
?>
