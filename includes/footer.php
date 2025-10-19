<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-col">
                <h3><?php echo $trans['site_name']; ?></h3>
                <p><?php echo $trans['footer']['about']; ?></p>
            </div>
            
            <div class="footer-col">
                <h4><?php echo $trans['footer']['quick_links']; ?></h4>
                <ul class="footer-links">
                    <li><a href="index.php"><?php echo $trans['nav']['home']; ?></a></li>
                    <li><a href="products.php"><?php echo $trans['nav']['products']; ?></a></li>
                    <li><a href="about.php"><?php echo $trans['nav']['about']; ?></a></li>
                    <li><a href="contact.php"><?php echo $trans['nav']['contact']; ?></a></li>
                </ul>
            </div>
            
            <div class="footer-col">
                <h4><?php echo $trans['footer']['contact_info']; ?></h4>
                <ul class="footer-info">
                    <li>📧 <?php echo $settings['email']; ?></li>
                    <li>📱 <?php echo $settings['phone']; ?></li>
                    <li>📍 <?php echo $settings['address']; ?></li>
                </ul>
            </div>
            
            <div class="footer-col">
                <h4><?php echo $trans['footer']['follow_us']; ?></h4>
                <div class="social-links">
                    <?php if (!empty($settings['social']['facebook'])): ?>
                    <a href="<?php echo $settings['social']['facebook']; ?>" target="_blank" class="social-link">📘</a>
                    <?php endif; ?>
                    <?php if (!empty($settings['social']['instagram'])): ?>
                    <a href="<?php echo $settings['social']['instagram']; ?>" target="_blank" class="social-link">📷</a>
                    <?php endif; ?>
                    <?php if (!empty($settings['social']['whatsapp'])): ?>
                    <a href="<?php echo $settings['social']['whatsapp']; ?>" target="_blank" class="social-link">💬</a>
                    <?php endif; ?>
                    <?php if (!empty($settings['social']['linkedin'])): ?>
                    <a href="<?php echo $settings['social']['linkedin']; ?>" target="_blank" class="social-link">💼</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php echo $trans['site_name']; ?>. <?php echo $trans['footer']['rights']; ?>.</p>
        </div>
    </div>
</footer>

<script src="assets/js/theme.js"></script>
<script src="assets/js/i18n.js"></script>
<script src="assets/js/effects.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
