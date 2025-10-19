<?php
require_once __DIR__ . '/../includes/guard.php';
require_once __DIR__ . '/../includes/functions.php';

$lang = getCurrentLanguage();
$trans = getTranslations($lang);
$settings = getSettings();
?>
<!DOCTYPE html>
<html lang="<?php echo $lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $trans['admin']['settings']; ?> - <?php echo $trans['site_name']; ?></title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="../assets/css/dark.css">
</head>
<body>
    <?php include 'includes/admin-nav.php'; ?>
    
    <div class="admin-container">
        <div class="admin-header">
            <h1><?php echo $trans['admin']['settings']; ?></h1>
        </div>
        
        <div class="settings-form">
            <form id="settingsForm">
                <div class="form-section">
                    <h3><?php echo $trans['admin']['company_info']; ?></h3>
                    <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" name="company" value="<?php echo $settings['company']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="<?php echo $settings['email']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="tel" name="phone" value="<?php echo $settings['phone']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" value="<?php echo $settings['address']; ?>" required>
                    </div>
                </div>
                
                <div class="form-section">
                    <h3><?php echo $trans['admin']['social_media']; ?></h3>
                    <div class="form-group">
                        <label>Facebook</label>
                        <input type="url" name="facebook" value="<?php echo $settings['social']['facebook']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Instagram</label>
                        <input type="url" name="instagram" value="<?php echo $settings['social']['instagram']; ?>">
                    </div>
                    <div class="form-group">
                        <label>WhatsApp</label>
                        <input type="url" name="whatsapp" value="<?php echo $settings['social']['whatsapp']; ?>">
                    </div>
                    <div class="form-group">
                        <label>LinkedIn</label>
                        <input type="url" name="linkedin" value="<?php echo $settings['social']['linkedin']; ?>">
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary"><?php echo $trans['admin']['save']; ?></button>
            </form>
            
            <div id="settingsMessage" class="form-message" style="display: none;"></div>
        </div>
    </div>
    
    <script src="../assets/js/theme.js"></script>
    <script src="../assets/js/admin-settings.js"></script>
</body>
</html>
