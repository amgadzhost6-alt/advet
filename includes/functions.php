<?php
// Helper functions for AdVet application

function getJsonData($filename) {
    $filepath = __DIR__ . '/../data/' . $filename;
    if (!file_exists($filepath)) {
        return [];
    }
    $content = file_get_contents($filepath);
    return json_decode($content, true) ?? [];
}

function saveJsonData($filename, $data) {
    $filepath = __DIR__ . '/../data/' . $filename;
    $fp = fopen($filepath, 'w');
    if (flock($fp, LOCK_EX)) {
        fwrite($fp, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        flock($fp, LOCK_UN);
    }
    fclose($fp);
    return true;
}

function sanitizeInput($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function getCurrentLanguage() {
    return $_SESSION['lang'] ?? 'en';
}

function setLanguage($lang) {
    if (in_array($lang, ['en', 'ar'])) {
        $_SESSION['lang'] = $lang;
    }
}

function getTranslations($lang = null) {
    if ($lang === null) {
        $lang = getCurrentLanguage();
    }
    $filepath = __DIR__ . '/../lang/' . $lang . '.json';
    if (!file_exists($filepath)) {
        $filepath = __DIR__ . '/../lang/en.json';
    }
    $content = file_get_contents($filepath);
    return json_decode($content, true) ?? [];
}

function t($key, $lang = null) {
    $translations = getTranslations($lang);
    $keys = explode('.', $key);
    $value = $translations;
    
    foreach ($keys as $k) {
        if (isset($value[$k])) {
            $value = $value[$k];
        } else {
            return $key;
        }
    }
    
    return $value;
}

function generateId($data) {
    if (empty($data)) {
        return 1;
    }
    $maxId = 0;
    foreach ($data as $item) {
        if (isset($item['id']) && $item['id'] > $maxId) {
            $maxId = $item['id'];
        }
    }
    return $maxId + 1;
}

function uploadImage($file, $directory = 'products') {
    $targetDir = __DIR__ . '/../assets/images/' . $directory . '/';
    
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }
    
    $imageFileType = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    
    if (!in_array($imageFileType, $allowedTypes)) {
        return ['success' => false, 'error' => 'Invalid file type'];
    }
    
    if ($file['size'] > 5000000) {
        return ['success' => false, 'error' => 'File too large'];
    }
    
    $filename = uniqid() . '.' . $imageFileType;
    $targetFile = $targetDir . $filename;
    
    if (move_uploaded_file($file['tmp_name'], $targetFile)) {
        return ['success' => true, 'filename' => $filename];
    }
    
    return ['success' => false, 'error' => 'Upload failed'];
}

function getSettings() {
    return getJsonData('settings.json');
}

function isRTL() {
    return getCurrentLanguage() === 'ar';
}
?>
