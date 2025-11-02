<?php
// Pobierz pole ACF Post Object - może być tablicą lub pojedynczym postem
$szkolenia_posts = get_field('szkolenia');

// Jeśli nie jest tablicą, zamień na tablicę
if (!is_array($szkolenia_posts)) {
    $szkolenia_posts = $szkolenia_posts ? array($szkolenia_posts) : array();
}

if (!empty($szkolenia_posts)) :
?>

    <div class="b-services" data-aos="fade-up">
        <div class="swiper service-slider">
            <div class="swiper-wrapper">
                <?php foreach ($szkolenia_posts as $post) :
                    // Ustaw globalną zmienną $post dla funkcji WordPress
                    setup_postdata($post);

                    // Pobierz dane z posta
                    $title = get_the_title($post);
                    $permalink = get_permalink($post);
                    $thumbnail_id = get_post_thumbnail_id($post);
                    $excerpt = get_the_excerpt($post);

                    // Jeśli nie ma excerpt, użyj pierwszych słów z treści
                    if (empty($excerpt)) {
                        $excerpt = wp_trim_words(get_the_content($post), 20, '...');
                    }
                ?>
                    <div class="swiper-slide">
                        <article class="b-service">
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
                                    <a class="btn btn-primary" href="<?php echo esc_url($permalink); ?>">
                                        Czytaj więcej
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                <?php
                endforeach;
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
<?php endif; ?>