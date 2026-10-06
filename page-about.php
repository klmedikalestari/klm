<?php
/**
 * Template Name: About Us Page
 *
 * Custom template for the About Us page, replicating the layout of kinglabmedikalestari.com/about-us/
 *
 * @package Kinglab_Medika_Lestari_Theme
 */

get_header(); ?>

<!-- =============================================
     SECTION 1: OUR COMPANY (Hero split layout)
     ============================================= -->
<section class="about-company-section" id="our-company">
    <div class="container">
        <div class="about-company-grid">
            <!-- Left: Team Photo -->
            <div class="about-company-image">
                <?php
                $team_img = get_theme_mod('about_team_image', '');
                $img_url  = $team_img ? $team_img : Kinglab_Medika_Lestari_URI . '/assets/images/team-group.jpg';
                ?>
                <img src="<?php echo esc_url($img_url); ?>"
                     alt="<?php esc_attr_e('Our Team', 'Kinglab_Medika_Lestari-theme'); ?>"
                     class="team-photo">
            </div>

            <!-- Right: Company Description -->
            <div class="about-company-content">
                <h1><?php echo esc_html(get_theme_mod('about_company_heading', 'Our Company')); ?></h1>
                <p><?php echo esc_html(get_theme_mod('about_company_p1',
                    'Established in 1981, PT. Kinglab_Medika_Lestari is one of the leading distributor of Life Science, Biotechnology, Microbiology and Medical products in Indonesia. Coming from a humble beginning, Kinglab_Medika_Lestari has been contributing to the advancement of scientific technology in Indonesia for more than 40 years.'
                )); ?></p>
                <p><?php echo esc_html(get_theme_mod('about_company_p2',
                    'Part of our success comes from our motto "Serving you better". This motto has become DNA in our day-to-day life where we always aim to serve each other better, be that our clients, our principals and most importantly our work peers. Customer satisfaction is very important to us hence we are committed to always push the standards of our customer care and deliver the right solutions to your business needs.'
                )); ?></p>
                <p><?php echo esc_html(get_theme_mod('about_company_p3',
                    'Our head office is located in Jakarta with representative offices in Surabaya, Bandung, Bogor and Yogyakarta. Through efficient logistic operations we have catered clients from different industries in all major areas of Indonesia. One of our key strategic growth is to open more representative offices in other parts of Indonesia.'
                )); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- =============================================
     SECTION 2: ADVANTAGES (Dark blue bg + lab image)
     ============================================= -->
<section class="about-advantages-section" id="advantages">
    <div class="advantages-grid">
        <!-- Left: Text -->
        <div class="advantages-text">
            <h2><?php echo esc_html(get_theme_mod('about_advantages_title', 'Advantages')); ?></h2>
            <p><?php echo esc_html(get_theme_mod('about_advantages_p1',
                'One of the advantages of choosing Kinglab_Medika_Lestari is access to our expansive and cutting edge product portfolio ranging from Life Science equipments and consumables, Microbiological and Food Safety products, Animal Health kits, and Medical instruments and consumables. Kinglab_Medika_Lestari is continuously working in synergy with our global partners to add more exciting and advanced technological solutions to our product portfolio.'
            )); ?></p>
            <p><?php echo esc_html(get_theme_mod('about_advantages_p2',
                'Our head office is located in Jakarta with representative offices in Surabaya, Bandung, Bogor and Yogyakarta. Through efficient logistic operations we have catered clients from different industries in all major areas of Indonesia. One of our key strategic growth is to open more representative offices in other parts of Indonesia.'
            )); ?></p>
        </div>

        <!-- Right: Lab Photo -->
        <div class="advantages-image">
            <?php
            $adv_img = get_theme_mod('about_advantages_image', '');
            $adv_url = $adv_img ? $adv_img : Kinglab_Medika_Lestari_URI . '/assets/images/lab-equipment.jpg';
            ?>
            <img src="<?php echo esc_url($adv_url); ?>"
                 alt="<?php esc_attr_e('Laboratory', 'Kinglab_Medika_Lestari-theme'); ?>">
        </div>
    </div>
</section>

<!-- =============================================
     SECTION 3: VISION AND MISSION
     ============================================= -->
<section class="about-vision-section section-padding" id="vision-mission">
    <div class="container">
        <h2><?php echo esc_html(get_theme_mod('about_vision_title', 'Vision and Mission')); ?></h2>

        <div class="vision-content">
            <p><?php echo esc_html(get_theme_mod('about_vision_intro',
                'It is believed that growing is human nature. By growing, human are learning, and developing into a better individual. The process of growing our business has shaped Kinglab_Medika_Lestari to become who we are today. However to succeed in a business environment we must continue to grow without forgetting our underlying vision and mission.'
            )); ?></p>

            <div class="vision-mission-grid">
                <!-- Vision -->
                <div class="vision-card">
                    <div class="vm-icon"><i class="fas fa-eye"></i></div>
                    <h3><?php esc_html_e('Our Vision', 'Kinglab_Medika_Lestari-theme'); ?></h3>
                    <p><?php echo esc_html(get_theme_mod('about_vision_text',
                        'To become the leading distributor in Life Science and Medical business through effective synergy with our principals and achieving the best solution for our customers.'
                    )); ?></p>
                </div>

                <!-- Mission -->
                <div class="mission-card">
                    <div class="vm-icon"><i class="fas fa-bullseye"></i></div>
                    <h3><?php esc_html_e('Our Mission', 'Kinglab_Medika_Lestari-theme'); ?></h3>
                    <p><?php echo esc_html(get_theme_mod('about_mission_text',
                        'To improve customer satisfaction by consistently providing high quality innovative products and better service experience.'
                    )); ?></p>
                </div>
            </div>

            <p class="vision-closing"><?php echo esc_html(get_theme_mod('about_vision_closing',
                'Through this vision and mission, we hope to inspire our team, people and business for years to come and continue with our commitment to serve you better.'
            )); ?></p>
        </div>
    </div>
</section>

<!-- =============================================
     SECTION 4: OUR TEAM
     ============================================= -->
<section class="about-team-section section-padding" id="our-team">
    <div class="container">
        <div class="team-content-grid">
            <!-- Left: Team Photo -->
            <div class="team-photo-col">
                <?php
                $team2_img = get_theme_mod('about_team2_image', '');
                $team2_url = $team2_img ? $team2_img : Kinglab_Medika_Lestari_URI . '/assets/images/team-group.jpg';
                ?>
                <img src="<?php echo esc_url($team2_url); ?>"
                     alt="<?php esc_attr_e('Our Team', 'Kinglab_Medika_Lestari-theme'); ?>"
                     class="team-photo-large">
            </div>

            <!-- Right: Team Descriptions -->
            <div class="team-desc-col">
                <h2><?php echo esc_html(get_theme_mod('about_team_heading', 'OUR TEAM')); ?></h2>

                <?php
                $team_items = array(
                    array(
                        'icon'  => 'fas fa-microscope',
                        'title' => get_theme_mod('team_item_1_title', 'Application Team'),
                        'text'  => get_theme_mod('team_item_1_text',
                            'Our application team will help you to better understand the application of your product and instrument. It is important for us that our clients can maximize the potential and usage of the product, therefore achieving highest return on their investment.'
                        ),
                    ),
                    array(
                        'icon'  => 'fas fa-tools',
                        'title' => get_theme_mod('team_item_2_title', 'Service Engineer Team'),
                        'text'  => get_theme_mod('team_item_2_text',
                            'Our service engineer team is dedicated to help our clients throughout the installation process, and the after sales service including maintenance of your instrument and equipment. They can also provide technical support for problems and difficulties that arise during usage.'
                        ),
                    ),
                    array(
                        'icon'  => 'fas fa-headset',
                        'title' => get_theme_mod('team_item_3_title', 'Customer Service Team'),
                        'text'  => get_theme_mod('team_item_3_text',
                            'Our customer service team is available to provide our clients with the best-fit solution for any enquiries or problems that you may have with our products. We take customer satisfaction and customer care seriously as they are part of our commitment to serve you better.'
                        ),
                    ),
                );
                foreach ($team_items as $item) : ?>
                <div class="team-item">
                    <div class="team-item-icon"><i class="<?php echo esc_attr($item['icon']); ?>"></i></div>
                    <div class="team-item-body">
                        <h4><?php echo esc_html($item['title']); ?></h4>
                        <p><?php echo esc_html($item['text']); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Bottom Row: More team descriptions -->
        <div class="team-extra-grid">
            <?php
            $team_extra = array(
                array(
                    'icon'  => 'fas fa-user-shield',
                    'title' => get_theme_mod('team_item_4_title', 'Customer Satisfaction'),
                    'text'  => get_theme_mod('team_item_4_text',
                        'Customer satisfaction, integrity and confidence are first in our customer service philosophy. Align with our vision and mission, we are investing and equipping our team with the necessary skills and knowledge to better support our clients.'
                    ),
                ),
                array(
                    'icon'  => 'fas fa-handshake',
                    'title' => get_theme_mod('team_item_5_title', 'Sales Team'),
                    'text'  => get_theme_mod('team_item_5_text',
                        'Our sales team is here to help valuable clients discover the right product, to improve the quality of their work and increase the efficiency of the workflow. This process is then followed by our customer service team to ensure the buying experience is done efficiently and hassle-free.'
                    ),
                ),
                array(
                    'icon'  => 'fas fa-star',
                    'title' => get_theme_mod('team_item_6_title', 'Product Specialist Team'),
                    'text'  => get_theme_mod('team_item_6_text',
                        'Our product specialist team is the product expert in the team. They are here to help you better understand the features and functions of the product of your interest. They are continuously trained by our principals and experts in the industry, and are always keeping up with the latest technological offerings and features available in the market.'
                    ),
                ),
            );
            foreach ($team_extra as $item) : ?>
            <div class="team-extra-item">
                <div class="team-item-icon"><i class="<?php echo esc_attr($item['icon']); ?>"></i></div>
                <div class="team-item-body">
                    <h4><?php echo esc_html($item['title']); ?></h4>
                    <p><?php echo esc_html($item['text']); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- =============================================
     SECTION 5: CTA BANNER
     ============================================= -->
<?php get_template_part('template-parts/cta-banner'); ?>

<?php get_footer(); ?>
