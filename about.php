<?php
require_once 'includes/functions.php';
$pageTitle = t('nav.about');
require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>

<main class="about-page">
    <section class="page-header">
        <div class="container">
            <h1 class="page-title"><?php echo $trans['about']['title']; ?></h1>
        </div>
    </section>

    <section class="about-content">
        <div class="container">
            <div class="about-section fade-in-scroll">
                <h2><?php echo $trans['about']['mission_title']; ?></h2>
                <p class="lead"><?php echo $trans['about']['mission_text']; ?></p>
            </div>

            <div class="values-section">
                <h2 class="section-title"><?php echo $trans['about']['values_title']; ?></h2>
                <div class="values-grid">
                    <div class="value-card fade-in-scroll">
                        <div class="value-icon">✅</div>
                        <h3><?php echo $trans['about']['quality']; ?></h3>
                        <p><?php echo $trans['about']['quality_desc']; ?></p>
                    </div>
                    <div class="value-card fade-in-scroll">
                        <div class="value-icon">🤝</div>
                        <h3><?php echo $trans['about']['trust']; ?></h3>
                        <p><?php echo $trans['about']['trust_desc']; ?></p>
                    </div>
                    <div class="value-card fade-in-scroll">
                        <div class="value-icon">🩺</div>
                        <h3><?php echo $trans['about']['expertise']; ?></h3>
                        <p><?php echo $trans['about']['expertise_desc']; ?></p>
                    </div>
                </div>
            </div>

            <div class="contact-info-section fade-in-scroll">
                <h2><?php echo $trans['footer']['contact_info']; ?></h2>
                <div class="contact-details">
                    <div class="contact-item">
                        <span class="contact-icon">📧</span>
                        <span><?php echo $settings['email']; ?></span>
                    </div>
                    <div class="contact-item">
                        <span class="contact-icon">📱</span>
                        <span><?php echo $settings['phone']; ?></span>
                    </div>
                    <div class="contact-item">
                        <span class="contact-icon">📍</span>
                        <span><?php echo $settings['address']; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once 'includes/footer.php'; ?>
