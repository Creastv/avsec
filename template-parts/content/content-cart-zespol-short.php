<?php
$position = get_field('nazwa_pozycji', get_the_ID());
?>
<article class="team-item-short">
    <div class="team-item__wrap">
        <!-- <?php if (has_post_thumbnail(get_the_ID())) : ?>
            <div class="team-item__img">
                <?php the_post_thumbnail('product-image', array('alt' => get_the_title())); ?>
            </div>
        <?php else : ?>
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/thumbnail.png'); ?>"
                alt="<?php echo esc_attr(get_the_title()); ?>" class="placeholder-thumb" />
        <?php endif; ?>  -->
        <div class="team-item__content">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php if ($position) : ?>
            <span><?php echo $position; ?></span>
            <?php endif; ?>
            <p class="entry-content"><?php echo custom_excerpt(15); ?></p>
            <!-- <a href="<?php the_permalink(); ?>"
                class="btn btn-outline-primary small"><?php echo _e('Czytaj więcej', 'go'); ?></a> -->
        </div>

    </div>
</article>