<?php
/**
 * Partners Section Template
 * Mendukung upload logo via WordPress Customizer (Appearance > Customize > Partners Section)
 */

// Kumpulkan logo yang valid
$partner_logos = array();

for ($i = 1; $i <= 20; $i++) {
    $raw = get_theme_mod("kl_partner_img_{$i}", '');

    // Lewati jika kosong
    if (empty($raw)) {
        continue;
    }

    $logo_url = '';

    if (is_numeric($raw)) {
        // Simpan sebagai attachment ID — konversi ke URL
        $logo_url = wp_get_attachment_image_url(intval($raw), 'full');
        if (empty($logo_url)) {
            // Fallback ke wp_get_attachment_url
            $logo_url = wp_get_attachment_url(intval($raw));
        }
    } else {
        // Simpan sebagai URL langsung
        $logo_url = $raw;
    }

    if (!empty($logo_url)) {
        $partner_logos[] = $logo_url;
    }
}
?>

<!-- Partners Section -->
<section class="partners-section section-padding" id="partners-section">
    <div class="container">
        <div class="section-title">
            <h2><?php echo esc_html(get_theme_mod('partners_title', 'Our Global Partners')); ?></h2>
            <p><?php echo esc_html(get_theme_mod('partners_subtitle', 'We represent leading global brands with local expertise')); ?></p>
        </div>

        <div class="partners-grid">
            <?php if (!empty($partner_logos)) : ?>

                <?php foreach ($partner_logos as $index => $logo_url) : ?>
                    <div class="partner-item">
                        <img
                            src="<?php echo esc_url($logo_url); ?>"
                            alt="<?php echo esc_attr(sprintf('Partner %d', $index + 1)); ?>"
                            loading="lazy"
                        >
                    </div>
                <?php endforeach; ?>

            <?php else : ?>

                <!-- Fallback: tampil hanya jika belum ada logo yang diupload -->
                <?php
                $placeholders = array('Partner 1', 'Partner 2', 'Partner 3', 'Partner 4', 'Partner 5', 'Partner 6');
                foreach ($placeholders as $name) :
                ?>
                    <div class="partner-item">
                        <div class="partner-placeholder"><?php echo esc_html($name); ?></div>
                    </div>
                <?php endforeach; ?>

            <?php endif; ?>
        </div>
    </div>
</section>
