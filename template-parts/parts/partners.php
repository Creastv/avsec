<?php
$logos = get_field('logos', 'options');
$display = get_field('wylacz_partnerow');
?>

<?php if ($logos && !is_singular(array('post', 'szkolenia')) && !$display && is_page_template('page-form.php')) : ?>
    <div class="info-partners__logos">
        <div class="container-full">
            <p class="partners-title">
                <b> <?php echo __('Nasi partnerzy', 'avsec'); ?></b>
            </p>
            <div class="swiper js-pm">
                <div class=" swiper-wrapper">
                    <?php foreach ($logos as $logo) : ?>
                        <div class="swiper-slide partner-logo">
                            <div class="item">
                                <?php if ($logo['logo']): ?>
                                    <?php echo wp_get_attachment_image($logo['logo'], 'full'); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>