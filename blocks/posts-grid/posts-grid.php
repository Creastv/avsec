<?php
$style = get_field('style');
$type = get_field('wyswietlane_posty_po');
$kategoria = get_field('kategorie');
$posts = get_field('wyswietlane_posty_po');

?>
<?php if ($type == 2) {   ?>

<?php if ($style == 'Styl 1') { ?>
<?php get_template_part('blocks/posts-grid/post-grid-last'); ?>
<?php } else { ?>
<?php get_template_part('blocks/posts-grid/post-last'); ?>
<?php } ?>

<?php }
if ($type == 1) { ?>
<?php if ($style == 'Styl 1') { ?>
<?php get_template_part('blocks/posts-grid/post-grid-cat'); ?>
<?php } else { ?>
<?php get_template_part('blocks/posts-grid/post-cat'); ?>
<?php } ?>
<?php } ?>