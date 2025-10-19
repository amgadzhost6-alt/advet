<?php
require_once __DIR__ . '/../includes/guard.php';
require_once __DIR__ . '/../includes/functions.php';

$lang = getCurrentLanguage();
$trans = getTranslations($lang);
$quotations = getJsonData('quotations.json');
$products = getJsonData('products.json');

// Create product lookup
$productMap = [];
foreach ($products as $p) {
    $productMap[$p['id']] = $p;
}
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $trans['admin']['quotations']; ?> - <?php echo $trans['site_name']; ?></title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="../assets/css/dark.css">
</head>
<body>
    <?php include 'includes/admin-nav.php'; ?>
    
    <div class="admin-container">
        <div class="admin-header">
            <h1><?php echo $trans['admin']['quotations']; ?></h1>
        </div>
        
        <?php if (empty($quotations)): ?>
        <div class="empty-state">
            <p>No quotations yet</p>
        </div>
        <?php else: ?>
        <div class="quotations-list">
            <?php foreach (array_reverse($quotations) as $quote): ?>
            <?php 
            $product = $productMap[$quote['product_id']] ?? null;
            $productName = $product ? ($lang === 'ar' ? $product['name_ar'] : $product['name_en']) : 'Unknown Product';
            ?>
            <div class="quotation-card">
                <div class="quotation-header">
                    <span class="quotation-id">#<?php echo $quote['id']; ?></span>
                    <span class="quotation-date"><?php echo $quote['date']; ?></span>
                    <span class="badge badge-<?php echo $quote['status']; ?>"><?php echo $quote['status']; ?></span>
                </div>
                <div class="quotation-body">
                    <div class="quotation-info">
                        <p><strong>Customer:</strong> <?php echo $quote['customer']['name']; ?></p>
                        <p><strong>Email:</strong> <?php echo $quote['customer']['email']; ?></p>
                        <p><strong>Phone:</strong> <?php echo $quote['customer']['phone']; ?></p>
                    </div>
                    <div class="quotation-details">
                        <p><strong>Product:</strong> <?php echo $productName; ?></p>
                        <p><strong>Quantity:</strong> <?php echo $quote['quantity']; ?></p>
                        <?php if (!empty($quote['notes'])): ?>
                        <p><strong>Notes:</strong> <?php echo $quote['notes']; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
    
    <script src="../assets/js/theme.js"></script>
</body>
</html>
