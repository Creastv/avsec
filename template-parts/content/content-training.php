<article class="b-service">
    <div class="b-service__image">
        <a href="<?php echo esc_url($permalink); ?>">
            <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('full'); ?>
            <?php else : ?>
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/thumbnail.png'); ?>"
                alt="<?php echo esc_attr(get_the_title()); ?>" class="placeholder-thumb" />
            <?php endif; ?>
        </a>
    </div>
    <div class="b-service-conent">
        <?php if (!empty(get_the_title())) : ?>
        <h2><?php the_title(); ?></h2>
        <?php endif; ?>
        <div class="b-service-conent__button">
            <a class="btn btn-primary" href="<?php the_permalink(); ?>">
                Czytaj więcej
            </a>
        </div>
    </div>
    <?php if (is_user_logged_in() && current_user_can('administrator')) : ?>
    <footer class="post-footer">
        <a href="<?php echo get_edit_post_link(); ?>" class="edit-link" style="margin-left:10px;">
            Edytuj
        </a>
    </footer>
    <?php endif; ?>
</article>