<?php
$kategoria = get_field('kategorie');
$pozycja = get_field('pozycja');
$class = 'lewo';
if ($pozycja == 'Prawo') {
    $class = 'prawo';
}
$po = array(
    'post_type' => 'post',
    'posts_per_page' => 1,
    'ignore_sticky_posts' => 1,
    'cat' => $kategoria
);
$query_posts_one = new WP_Query($po);
$po2 = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'ignore_sticky_posts' => 1,
    'offset' => 1,
    'cat' => $kategoria
);
$query_posts_two = new WP_Query($po2);
$co = 1;
?>
<section class="posts-grid">
    <div class="posts-grid__wrap <?php echo $class; ?>">
        <div class="col">
            <?php while ($query_posts_one->have_posts()) {
                $query_posts_one->the_post();
                $term_list = wp_get_post_terms(get_the_id(), 'category',);
            ?>
                <article class="post">
                    <div class="post__img">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('large'); ?>
                        </a>
                    </div>
                    <div class="post__content">
                        <div class="entry-term">
                            <?php foreach ($term_list as $term): ?>
                                <a
                                    href="<?php echo get_term_link($term->term_id, 'category'); ?>"><?php echo $term->name; ?></a>
                            <?php endforeach; ?>
                        </div>
                        <h2 class="entry-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                        <p class="entry-content"><?php echo custom_excerpt(30); ?></p>
                    </div>
                </article>
            <?php }
            wp_reset_postdata(); ?>
        </div>
        <div class="col">
            <?php while ($query_posts_two->have_posts()) {
                $query_posts_two->the_post();
                $term_list = wp_get_post_terms(get_the_id(), 'category');
            ?>
                <article class="post-vertical">
                    <div class="post__img">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('thumbnail'); ?>
                        </a>
                    </div>
                    <div class="post__content">
                        <div class="entry-term">
                            <?php foreach ($term_list as $term): ?>
                                <a
                                    href="<?php echo get_term_link($term->term_id, 'category'); ?>"><?php echo $term->name; ?></a>
                            <?php endforeach; ?>
                        </div>
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