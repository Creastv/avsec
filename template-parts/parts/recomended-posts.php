<?php
// $category_object = get_the_category(get_the_ID());
// $category_name = $category_object[0]->name;
// $active = get_the_ID();

$articles = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 4,
    'order' => 'DESC',
    // 'category_name' => $category_name,
    'orderby'        => 'rand',
    // 'post__not_in' => array($active),

));
?>
<div class="recommended-posts">
    <div class="recommended-posts__wrap">
        <div class="container">
            <h3 class="text-center h2"><?php echo _e('Może cię zainteresować', 'go'); ?></h3>
            <br>
            <div class="recommended-posts__posts-wraper">
                <?php while ($articles->have_posts()) : $articles->the_post(); ?>
                    <article>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                        <div class="post-content">
                            <h3 class="post-title"><?php the_title(); ?></h3>
                            <div class="post-excerpt"> <?php echo custom_excerpt(10); ?></div>
                        </div>
                    </article>
                <?php endwhile;
                wp_reset_query(); ?>
            </div>
        </div>
    </div>
</div>