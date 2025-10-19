<nav class="admin-nav">
    <div class="admin-nav-brand">
        <a href="dashboard.php">
            <span class="logo-icon">🐾</span>
            <span class="logo-text"><?php echo $trans['site_name']; ?> Admin</span>
        </a>
    </div>
    
    <ul class="admin-nav-menu">
        <li><a href="dashboard.php">📊 <?php echo $trans['admin']['dashboard']; ?></a></li>
        <li><a href="products.php">📦 <?php echo $trans['admin']['products']; ?></a></li>
        <li><a href="quotations.php">📋 <?php echo $trans['admin']['quotations']; ?></a></li>
        <li><a href="messages.php">✉️ <?php echo $trans['admin']['messages']; ?></a></li>
        <li><a href="settings.php">⚙️ <?php echo $trans['admin']['settings']; ?></a></li>
    </ul>
    
    <div class="admin-nav-actions">
        <a href="index.php" target="_blank" class="btn-icon" title="View Site">🌐</a>
        <a href="logout.php" class="btn-icon" title="<?php echo $trans['admin']['logout']; ?>">🚪</a>
    </div>
</nav>
