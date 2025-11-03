<?php

$slider = get_field('slider');

?>
<?php if (!empty($slider)) : ?>
<div class="b-slider">
    <div class="container-large">
        <div class="swiper hero-slider">
            <div class="swiper-wrapper">
                <?php foreach ($slider as $item) :
                        $link = $item['link'];
                        $desc = $item['desc'];
                        $title = $item['title'];
                        $tag = $item['tag'];
                        $img = $item['img'];

                        if ($link):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                        endif;
                    ?>
                <div class="swiper-slide">
                    <div class="b-slider__image">
                        <?php echo wp_get_attachment_image($img, 'full', false, array('class' => 'go-parallexx')); ?>

                    </div>
                    <div class="b-slider-conent">
                        <div class="container">

                            <div class="b-slider-conent__inner">
                                <?php if (!empty($title)) : ?>
                                <?php echo $tag ? '<' . $tag . ' class="b-slider-conent__title">' : '<h1>'; ?>
                                <?php echo $title; ?>
                                <?php echo $tag ? '</' . $tag . '>' : '</h1>'; ?>
                                <?php endif; ?>
                                <?php if (!empty($desc)) : ?>
                                <div class="b-slider-conent__desc">
                                    <p> <?php echo $desc; ?></p>
                                </div>
                                <?php endif; ?>
                                <?php if ($link) : ?>
                                <a class="btn btn-primary" href="<?php echo esc_url($link_url); ?>"
                                    target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>
            <div class="swiper-pagination swiper-pagination--home"></div>
        </div>
    </div>
</div>
<?php endif; ?>