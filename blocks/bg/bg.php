<?php
$bg = get_field('bg_color');
$h = get_field('height');
$p = get_field('position');
$img = get_field('zdjecie');
$size = get_field('size');
$sizeClass = 'container';
if ($size == 1) {
    $sizeClass = 'container';
} elseif ($size == 2) {
    $sizeClass = 'container-full';
} elseif ($size == 4) {
    $sizeClass = '';
} else {
    $sizeClass = 'container-narrow';
}

$position = '';
if ($p == 1) {
    $position = 'top:0;';
} else {
    $position = 'bottom:0;';
}
$class_name = 'b-bg';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<div class="<?php echo esc_attr($class_name); ?> ">
    <div class="b-bg-apla"
        style="background-color:<?php echo $bg; ?>; height:<?php echo $h; ?>%; <?php echo $position; ?>; background-image:url(<?php echo $img; ?>) ">
    </div>
    <?php if ($size != 4) : ?>
    <div class="<?php echo $sizeClass; ?>">
        <InnerBlocks />
    </div>
    <?php else : ?>
    <InnerBlocks />
    <?php endif; ?>
</div>