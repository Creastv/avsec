<?php
// Pobierz aktualne szkolenie
$current_id = get_the_ID();

// Pobierz kategorie aktualnego szkolenia
$current_categories = wp_get_post_terms($current_id, 'szkolenia_kategoria', array('fields' => 'ids'));

// Query dla polecanych szkoleń
$query_args = array(
    'post_type' => 'szkolenia',
    'posts_per_page' => -1,
    'order' => 'DESC',
    'orderby' => 'rand',
    // 'post__not_in' => array($current_id),
);

// Dodaj tax_query tylko jeśli są kategorie
if (!empty($current_categories) && !is_wp_error($current_categories)) {
    $query_args['tax_query'] = array(
        array(
            'taxonomy' => 'szkolenia_kategoria',
            'field'    => 'term_id',
            'terms'    => $current_categories,
        ),
    );
}

$trainings = new WP_Query($query_args);

// Jeśli nie ma szkoleń z tej samej kategorii, pobierz losowe
if (!$trainings->have_posts()) {
    $trainings = new WP_Query(array(
        'post_type' => 'szkolenia',
        'posts_per_page' => -1,
        'order' => 'DESC',
        'orderby' => 'rand',
        'post__not_in' => array($current_id),
    ));
}

if ($trainings->have_posts()) :
?>
    <div class="recomended-training">

        <div class="b-services" data-aos="fade-up">
            <div class="container-narrow">
                <h3 class="text-center h2"><?php echo _e('Może cię zainteresować', 'go'); ?></h3>
                <br>
            </div>
            <div class="container-full ">
                <div class="swiper service-slider">
                    <div class="swiper-wrapper">
                        <?php while ($trainings->have_posts()) : $trainings->the_post();
                            // Pobierz dane z posta
                            $title = get_the_title();
                            $permalink = get_permalink();
                            $thumbnail_id = get_post_thumbnail_id();
                            $excerpt = get_the_excerpt();

                            // Jeśli nie ma excerpt, użyj pierwszych słów z treści
                            if (empty($excerpt)) {
                                $excerpt = wp_trim_words(get_the_content(), 20, '...');
                            }
                        ?>
                            <div class="swiper-slide">
                                <div class="b-service">
                                    <div class="b-service__image">
                                        <a href="<?php echo esc_url($permalink); ?>">
                                            <?php
                                            if ($thumbnail_id) {
                                                echo wp_get_attachment_image($thumbnail_id, 'servic', false, array('class' => ''));
                                            } else {
                                                echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/img/thumbnail.png') . '" alt="' . esc_attr($title) . '">';
                                            }
                                            ?>
                                        </a>
                                    </div>
                                    <div class="b-service-conent">
                                        <?php if (!empty($title)) : ?>
                                            <h2><?php echo esc_html($title); ?></h2>
                                        <?php endif; ?>

                                        <div class="b-service-conent__button">
                                            <p><?php echo custom_excerpt(20, ' ...', false); ?></p>
                                            <a class="btn btn-primary" href="<?php echo esc_url($permalink); ?>">
                                                <?php echo esc_html__('Czytaj więcej', 'avsec'); ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endwhile;
                        wp_reset_postdata(); // Resetuj dane posta
                        ?>
                    </div>
                    <div class="swiper-nav">
                        <div class="swiper-button-next s-button-next">
                            <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M22 30L30 22M30 22L22 14M30 22L14 22M2 22C2 10.9543 10.9543 2 22 2C33.0457 2 42 10.9543 42 22C42 33.0457 33.0457 42 22 42C10.9543 42 2 33.0457 2 22Z"
                                    stroke="#BEBEBE" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="swiper-button-prev s-button-prev">
                            <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M24 16L16 24M16 24L24 32M16 24H32M44 24C44 35.0457 35.0457 44 24 44C12.9543 44 4 35.0457 4 24C4 12.9543 12.9543 4 24 4C35.0457 4 44 12.9543 44 24Z"
                                    stroke="#BEBEBE" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>