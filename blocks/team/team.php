<?php
$style = get_field('style');
?>
<?php if ($style == 1) : ?>
    <!-- 🔹 POSTY -->
    <div id="team-list">
        <?php
        $args = array(
            'post_type'      => 'zespol',
            'posts_per_page' => 10,
            'post_status'    => 'publish',
            'paged'          => 1,
            'orderby'        => 'date',
            'order'          => 'ASC'
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); ?>
                <?php get_template_part('template-parts/content/content', 'cart-zespol'); ?>
        <?php endwhile;
        endif;
        wp_reset_postdata();
        ?>
    </div>
    <h1>test</h1>
    <!-- 🔹 PRZYCISK "WCZYTAJ WIĘCEJ" -->
    <?php if ($query->found_posts > 10) { ?>
        <div class="load-more-wrap">
            <button id="load-more-team" data-page-team="1" class="btn btn-outline-primary">
                <?php echo _e('Wczytaj więcej', 'go'); ?>
            </button>
        </div>
    <?php } ?>

<?php else : ?>
    <div id="team-list-carousel">
        <div class="swiper mySwiper-team">
            <div class="swiper-wrapper">
                <?php
                $args = array(
                    'post_type'      => 'zespol',
                    'posts_per_page' => 8,
                    'post_status'    => 'publish',
                    'paged'          => 1,
                    'orderby'        => 'date',
                    'order'          => 'ASC'
                );
                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="swiper-slide">
                            <?php get_template_part('template-parts/content/content', 'cart-zespol-short'); ?>
                        </div>
                <?php endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>


        </div>
        <div class="nav-swiper">
            <div class="s-next"><svg width="44" height="44" viewBox="0 0 44 44" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M22 14L14 22M14 22L22 30M14 22H30M42 22C42 33.0457 33.0457 42 22 42C10.9543 42 2 33.0457 2 22C2 10.9543 10.9543 2 22 2C33.0457 2 42 10.9543 42 22Z"
                        stroke="#BEBEBE" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
            <div class="s-prev">
                <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M24 32L32 24M32 24L24 16M32 24L16 24M4 24C4 12.9543 12.9543 4 24 4C35.0457 4 44 12.9543 44 24C44 35.0457 35.0457 44 24 44C12.9543 44 4 35.0457 4 24Z"
                        stroke="#BEBEBE" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper-team", {
            slidesPerView: 1,
            spaceBetween: 0,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1224: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
            },
            navigation: {
                nextEl: "#team-list-carousel .s-next",
                prevEl: "#team-list-carousel .s-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>

<?php endif; ?>