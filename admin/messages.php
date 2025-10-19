<?php
require_once __DIR__ . '/../includes/guard.php';
require_once __DIR__ . '/../includes/functions.php';

$lang = getCurrentLanguage();
$trans = getTranslations($lang);
$messages = getJsonData('messages.json');
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $trans['admin']['messages']; ?> - <?php echo $trans['site_name']; ?></title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="../assets/css/dark.css">
</head>
<body>
    <?php include 'includes/admin-nav.php'; ?>
    
    <div class="admin-container">
        <div class="admin-header">
            <h1><?php echo $trans['admin']['messages']; ?></h1>
        </div>
        
        <?php if (empty($messages)): ?>
        <div class="empty-state">
            <p>No messages yet</p>
        </div>
        <?php else: ?>
        <div class="messages-list">
            <?php foreach (array_reverse($messages) as $message): ?>
            <div class="message-card <?php echo ($message['read'] ?? false) ? 'read' : 'unread'; ?>">
                <div class="message-header">
                    <span class="message-id">#<?php echo $message['id']; ?></span>
                    <span class="message-date"><?php echo $message['date']; ?></span>
                    <?php if (!($message['read'] ?? false)): ?>
                    <span class="badge badge-new">New</span>
                    <?php endif; ?>
                </div>
                <div class="message-body">
                    <p><strong>Name:</strong> <?php echo $message['name']; ?></p>
                    <p><strong>Email:</strong> <?php echo $message['email']; ?></p>
                    <p><strong>Phone:</strong> <?php echo $message['phone']; ?></p>
                    <p><strong>Message:</strong></p>
                    <p class="message-text"><?php echo nl2br($message['message']); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
    
    <script src="../assets/js/theme.js"></script>
</body>
</html>
