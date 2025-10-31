<?php
$kategoria = get_field('kategorie');
$po = array(
    'post_type' => 'post',
    'posts_per_page' => 4,
    'ignore_sticky_posts' => 1,
    'cat' => $kategoria
);
$query_posts_one = new WP_Query($po);

?>
<section class="posts-grid">
    <div class="posts-grid__wrap posts-grid__wrap--style-one">

        <?php while ($query_posts_one->have_posts()) {
            $query_posts_one->the_post();
            $term_list = wp_get_post_terms(get_the_id(), 'category');
        ?>
            <div class="col">
                <article class="post">
                    <div class="post__img">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('wc-product'); ?>
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
                        <p class="entry-content">
                            <?php the_excerpt(); ?>
                        </p>
                    </div>
                </article>
            </div>
        <?php }
        wp_reset_postdata(); ?>
    </div>
</section>