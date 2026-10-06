<!-- Services Section -->
<section class="services-section section-padding" id="services-section">
    <div class="container">
        <div class="section-title">
            <h2><?php echo esc_html(get_theme_mod('services_title', 'What We Do')); ?></h2>
            <p><?php esc_html_e('Comprehensive solutions across multiple sectors', 'Kinglab_Medika_Lestari-theme'); ?></p>
        </div>

        <div class="services-grid">
            <?php
            $service_defaults = array(
                1 => array('icon' => 'fas fa-flask',     'title' => 'Life Science',   'desc' => 'Providing advanced solutions for life science research and development, including laboratory equipment and reagents.'),
                2 => array('icon' => 'fas fa-industry',   'title' => 'Industry',       'desc' => 'Industrial solutions and equipment for modern manufacturing, quality control, and process optimization.'),
                3 => array('icon' => 'fas fa-paw',        'title' => 'Animal Health',  'desc' => 'Comprehensive solutions for animal health, veterinary diagnostics, and livestock management.'),
                4 => array('icon' => 'fas fa-heartbeat',  'title' => 'Medical',        'desc' => 'Cutting-edge medical equipment, diagnostic solutions, and healthcare technology.'),
            );

            for ($i = 1; $i <= 4; $i++) :
                $icon  = get_theme_mod("service_{$i}_icon", $service_defaults[$i]['icon']);
                $title = get_theme_mod("service_{$i}_title", $service_defaults[$i]['title']);
                $desc  = get_theme_mod("service_{$i}_desc", $service_defaults[$i]['desc']);
                $url   = get_theme_mod("service_{$i}_url", '#');
            ?>
                <div class="service-card">
                    <div class="service-card-icon">
                        <i class="<?php echo esc_attr($icon); ?>"></i>
                    </div>
                    <h3><?php echo esc_html($title); ?></h3>
                    <p><?php echo esc_html($desc); ?></p>
                    <a href="<?php echo esc_url($url); ?>" class="btn btn-primary">
                        <?php esc_html_e('Read More', 'Kinglab_Medika_Lestari-theme'); ?>
                    </a>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</section>
