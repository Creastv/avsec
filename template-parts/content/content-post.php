<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
    <header class="post-header">
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('medium'); ?>
                <?php else : ?>
                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/img/thumbnail.png'); ?>"
                    alt="<?php echo esc_attr(get_the_title()); ?>" class="placeholder-thumb" />
                <?php endif; ?>
            </a>
        </div>
    </header>
    <div class="post-content">
        <h2 class="post-title">
            <a href="<?php the_permalink(); ?>" rel="bookmark">
                <?php the_title(); ?>
            </a>
        </h2>
        <p><?php echo custom_excerpt(30); ?></p>
    </div>

    <?php if (is_user_logged_in() && current_user_can('administrator')) : ?>
    <footer class="post-footer">
        <a href="<?php echo get_edit_post_link(); ?>" class="edit-link" style="margin-left:10px;">
            Edytuj
        </a>
    </footer>
    <?php endif; ?>

</article>