<?php
require_once 'includes/functions.php';
$pageTitle = t('nav.contact');
require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>

<main class="contact-page">
    <section class="page-header">
        <div class="container">
            <h1 class="page-title"><?php echo $trans['contact']['title']; ?></h1>
            <p><?php echo $trans['contact']['subtitle']; ?></p>
        </div>
    </section>

    <section class="contact-content">
        <div class="container">
            <div class="contact-grid">
                <div class="contact-form-wrapper fade-in-scroll">
                    <form id="contactForm" class="contact-form">
                        <div class="form-group">
                            <label><?php echo $trans['contact']['name']; ?></label>
                            <input type="text" name="name" required>
                        </div>
                        <div class="form-group">
                            <label><?php echo $trans['contact']['email']; ?></label>
                            <input type="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label><?php echo $trans['contact']['phone']; ?></label>
                            <input type="tel" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label><?php echo $trans['contact']['message']; ?></label>
                            <textarea name="message" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary ripple"><?php echo $trans['contact']['submit']; ?></button>
                    </form>
                    <div id="contactMessage" class="form-message" style="display: none;"></div>
                </div>

                <div class="contact-info-wrapper fade-in-scroll">
                    <h3><?php echo $trans['contact']['info_title']; ?></h3>
                    <div class="contact-details">
                        <div class="contact-item">
                            <span class="contact-icon">📧</span>
                            <div>
                                <strong>Email</strong>
                                <p><?php echo $settings['email']; ?></p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <span class="contact-icon">📱</span>
                            <div>
                                <strong><?php echo $trans['contact']['phone']; ?></strong>
                                <p><?php echo $settings['phone']; ?></p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <span class="contact-icon">📍</span>
                            <div>
                                <strong><?php echo $trans['footer']['contact_info']; ?></strong>
                                <p><?php echo $settings['address']; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="social-links-section">
                        <h4><?php echo $trans['footer']['follow_us']; ?></h4>
                        <div class="social-links">
                            <?php if (!empty($settings['social']['facebook'])): ?>
                            <a href="<?php echo $settings['social']['facebook']; ?>" target="_blank" class="social-link">📘 Facebook</a>
                            <?php endif; ?>
                            <?php if (!empty($settings['social']['instagram'])): ?>
                            <a href="<?php echo $settings['social']['instagram']; ?>" target="_blank" class="social-link">📷 Instagram</a>
                            <?php endif; ?>
                            <?php if (!empty($settings['social']['whatsapp'])): ?>
                            <a href="<?php echo $settings['social']['whatsapp']; ?>" target="_blank" class="social-link">💬 WhatsApp</a>
                            <?php endif; ?>
                            <?php if (!empty($settings['social']['linkedin'])): ?>
                            <a href="<?php echo $settings['social']['linkedin']; ?>" target="_blank" class="social-link">💼 LinkedIn</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once 'includes/footer.php'; ?>
