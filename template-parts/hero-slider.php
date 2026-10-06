<!-- Hero Slider -->
<section class="hero-slider" id="hero-slider">
    <?php
    $default_slides = array(
        1 => array(
            'image'    => 'https://images.unsplash.com/photo-1582719471384-894fbb16e074?w=1920&q=80',
            'title'    => 'Innovative Solutions for Life Science',
            'text'     => 'Providing advanced laboratory equipment and solutions for research, industry, and healthcare.',
            'btn_text' => 'Read More',
            'btn_url'  => '#',
        ),
        2 => array(
            'image'    => 'https://images.unsplash.com/photo-1532187863486-abf9dbad1b69?w=1920&q=80',
            'title'    => 'Quality Products & Services',
            'text'     => 'More than 40 years of experience delivering excellence in laboratory solutions.',
            'btn_text' => 'Our Services',
            'btn_url'  => '#',
        ),
        3 => array(
            'image'    => 'https://images.unsplash.com/photo-1581093458791-9d42e3c7e117?w=1920&q=80',
            'title'    => 'Global Partners, Local Expertise',
            'text'     => 'Representing leading global brands with local knowledge and support.',
            'btn_text' => 'Learn More',
            'btn_url'  => '#',
        ),
    );

    $slides = array();
    for ($i = 1; $i <= 3; $i++) {
        $slides[] = array(
            'image'    => get_theme_mod("hero_slide_{$i}_image") ?: $default_slides[$i]['image'],
            'title'    => get_theme_mod("hero_slide_{$i}_title") ?: $default_slides[$i]['title'],
            'text'     => get_theme_mod("hero_slide_{$i}_text") ?: $default_slides[$i]['text'],
            'btn_text' => get_theme_mod("hero_slide_{$i}_btn_text") ?: $default_slides[$i]['btn_text'],
            'btn_url'  => get_theme_mod("hero_slide_{$i}_btn_url") ?: $default_slides[$i]['btn_url'],
        );
    }
    ?>

    <?php foreach ($slides as $index => $slide) : ?>
        <div class="hero-slide <?php echo $index === 0 ? 'active' : ''; ?>"
             style="background-image: url('<?php echo esc_url($slide['image']); ?>');"
             data-slide="<?php echo $index; ?>">
            <div class="hero-slide-content">
                <?php if ($slide['title']) : ?>
                    <h1><?php echo esc_html($slide['title']); ?></h1>
                <?php endif; ?>
                <?php if ($slide['text']) : ?>
                    <p><?php echo esc_html($slide['text']); ?></p>
                <?php endif; ?>
                <?php if ($slide['btn_text']) : ?>
                    <a href="<?php echo esc_url($slide['btn_url']); ?>" class="btn btn-primary">
                        <?php echo esc_html($slide['btn_text']); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>

    <!-- Slider Controls -->
    <?php if (count($slides) > 1) : ?>
        <button class="slider-arrow prev" aria-label="Previous Slide">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="slider-arrow next" aria-label="Next Slide">
            <i class="fas fa-chevron-right"></i>
        </button>

        <div class="slider-dots">
            <?php foreach ($slides as $index => $slide) : ?>
                <button class="slider-dot <?php echo $index === 0 ? 'active' : ''; ?>"
                        data-slide="<?php echo $index; ?>"
                        aria-label="Go to slide <?php echo $index + 1; ?>">
                </button>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>
