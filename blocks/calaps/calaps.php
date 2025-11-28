<?php
$title = get_field('title');
$calaps = get_field('calaps');
$block_id = 'calaps-' . $block['id'];

if ($title || $calaps) :
?>
    <div class="calaps-block" id="<?php echo esc_attr($block_id); ?>">
        <div class="calaps-item">
            <button class="calaps-header" aria-expanded="false" aria-controls="<?php echo esc_attr($block_id); ?>-content">
                <span class="calaps-title"><?php echo esc_html($title); ?></span>
                <span class="calaps-icon" aria-hidden="true"></span>
            </button>
            <div class="calaps-content" id="<?php echo esc_attr($block_id); ?>-content" aria-hidden="true">
                <div class="calaps-inner">
                    <?php echo $calaps; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>