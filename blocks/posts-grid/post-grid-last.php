<?php
$pozycja = get_field('pozycja');
$class = 'lewo';
if ($pozycja == 'Prawo') {
    $class = 'prawo';
}
$po = array(
    'post_type' => 'post',
    'posts_per_page' => 1,
    'ignore_sticky_posts' => 1,
);
$query_posts_one = new WP_Query($po);
$po2 = array(
    'post_type' => 'post',
    'posts_per_page' => 4,
    'offset' => 1,
    'ignore_sticky_posts' => 1,
);
$query_posts_two = new WP_Query($po2);
?>
<section class="posts-grid">
    <div class="posts-grid__wrap  <?php echo $class; ?>">
        <div class="col">
            <?php while ($query_posts_one->have_posts()) {
                $query_posts_one->the_post();

            ?>
                <article class="post">
                    <div class="post__img">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('large'); ?>
                        </a>
                    </div>
                    <div class="post__content">

                        <h2 class="entry-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        <p class="entry-content"><?php echo custom_excerpt(40); ?></p>
                    </div>
                </article>
            <?php }
            wp_reset_postdata(); ?>
        </div>
        <div class="col">
            <?php while ($query_posts_two->have_posts()) {
                $query_posts_two->the_post();

            ?>
                <article class="post-vertical">
                    <div class="post__img">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                        </a>
                    </div>
                    <div class="post__content">

                        <h2 class="entry-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        <p class="entry-content"><?php echo custom_excerpt(10); ?></p>
                    </div>
                </article>
            <?php }
            wp_reset_postdata(); ?>
        </div>
    </div>
</section>