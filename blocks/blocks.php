<?php
function register_acf_block_types()
{
  acf_register_block_type(array(
    'name'              => 'separator',
    'title'             => __('separator'),
    'render_template'   => 'blocks/separator/separator.php',
    'category'          => 'formatting',
    'icon' => array(
      'background' => '#c80100',
      'foreground' => '#fff',
      'src' => 'ellipsis',
    ),
    'mode'            => 'preview',
    'keywords'          => array('Kontener', 'separator'),
    'supports'    => [
      'align'      => false,
      'anchor'    => true,
      'customClassName'  => true,
      'jsx'       => false,
    ],
    'enqueue_assets'    => function () {
      wp_enqueue_style('go-separator',  get_template_directory_uri() . '/blocks/separator/separator.min.css');
    }
  ));
  acf_register_block_type(array(
    'name'              => 'info-contact',
    'title'             => __('Info kontakt'),
    'render_template'   => 'blocks/info-contact/info-contact.php',
    'category'          => 'formatting',
    'icon' => array(
      'background' => '#c80100',
      'foreground' => '#fff',
      'src' => 'ellipsis',
    ),
    'mode'            => 'preview',
    'keywords'          => array('kontakt', 'info-contact'),
    'supports'    => [
      'align'      => false,
      'anchor'    => true,
      'customClassName'  => true,
      'jsx'       => true,
    ],
    'enqueue_assets'    => function () {
      wp_enqueue_style('go-info-contact',  get_template_directory_uri() . '/blocks/info-contact/info-contact.min.css');
    }
  ));
  acf_register_block_type(array(
    'name'              => 'slider',
    'title'             => __('slider'),
    'render_template'   => 'blocks/slider/slider.php',
    'category'          => 'formatting',
    'icon' => array(
      'background' => '#c80100',
      'foreground' => '#fff',
      'src' => 'ellipsis',
    ),
    // 'enqueue_assets'    => function () {
    //   wp_enqueue_style('go-slider',  get_template_directory_uri() . '/blocks/slider/slider.min.css');
    //   wp_enqueue_script('go-gallery-js', get_template_directory_uri() . '/blocks/slider/slider.js', array('jquery'), null, true);
    // },
    'mode'            => 'preview',
    'keywords'          => array('hero', 'slider'),
    'supports'    => [
      'align'      => false,
      'anchor'    => true,
      'customClassName'  => true,
      'jsx'       => false,
    ],
  ));
  function enqueue_slider()
  {
    wp_enqueue_style('go-slider',  get_template_directory_uri() . '/blocks/slider/slider.min.css');
    wp_enqueue_script('go-gallery-js', get_template_directory_uri() . '/blocks/slider/slider.js', array('jquery'), null, true);
  }
  add_action('wp_enqueue_scripts', 'enqueue_slider');
  add_action('admin_enqueue_scripts', 'enqueue_slider');

  acf_register_block_type(array(
    'name'              => 'service',
    'title'             => __('Service'),
    'render_template'   => 'blocks/service/service.php',
    'category'          => 'formatting',
    'icon' => array(
      'background' => '#c80100',
      'foreground' => '#fff',
      'src' => 'ellipsis',
    ),
    'mode'            => 'preview',
    'keywords'          => array('Kontener', 'service'),
    'supports'    => [
      'align'      => false,
      'anchor'    => true,
      'customClassName'  => true,
      'jsx'       => false,
    ],
    'enqueue_assets'    => function () {
      wp_enqueue_style('go-service',  get_template_directory_uri() . '/blocks/service/service.min.css');
      wp_enqueue_script('go-service-js', get_template_directory_uri() . '/blocks/service/service.js', array('jquery'), '4', true);
    }
  ));
  acf_register_block_type(array(
    'name'              => 'bg',
    'title'             => __('Tło - kontener'),
    'render_template'   => 'blocks/bg/bg.php',
    'category'          => 'formatting',
    'icon' => array(
      'background' => '#c80100',
      'foreground' => '#fff',
      'src' => 'ellipsis',
    ),
    'mode'            => 'preview',
    'keywords'          => array('Kontener', 'bg'),
    'supports'    => [
      'align'      => false,
      'anchor'    => true,
      'customClassName'  => true,
      'jsx'       => true,
    ],
    'enqueue_assets'    => function () {
      wp_enqueue_style('go-bg',  get_template_directory_uri() . '/blocks/bg/bg.min.css');
    }
  ));
  acf_register_block_type(array(
    'name'              => 'bullets',
    'title'             => __('Bullets'),
    'render_template'   => 'blocks/bullets/bullets.php',
    'category'          => 'formatting',
    'icon' => array(
      'background' => '#c80100',
      'foreground' => '#fff',
      'src' => 'ellipsis',
    ),
    'mode'            => 'preview',
    'keywords'          => array('Kontener', 'bullets'),
    'supports'    => [
      'align'      => false,
      'anchor'    => true,
      'customClassName'  => true,
      'jsx'       => false,
    ],
    'enqueue_assets'    => function () {
      wp_enqueue_style('go-bullets',  get_template_directory_uri() . '/blocks/bullets/bullets.min.css');
    }
  ));

  acf_register_block_type(array(
    'name'              => 'posts-grid',
    'title'             => __('Posty - grid'),
    'render_template'   => 'blocks/posts-grid/posts-grid.php',
    'category'          => 'formatting',
    'icon' => array(
      'background' => '#c80100',
      'foreground' => '#fff',
      'src' => 'ellipsis',
    ),
    'mode'            => 'preview',
    'keywords'          => array('Aktualności'),
    'supports' => array('align' => false),
    'enqueue_assets'    => function () {
      wp_enqueue_style('go-posts-grid',  get_template_directory_uri() . '/blocks/posts-grid/posts-grid.min.css');
    },
  ));
  acf_register_block_type(array(
    'name'              => 'faq',
    'title'             => __('Najczęściej zadawane pytania'),
    'render_template'   => 'blocks/faq/faq.php',
    'category'          => 'formatting',
    'icon' => array(
      'background' => '#c80100',
      'foreground' => '#fff',
      'src' => 'ellipsis',
    ),
    'mode'            => 'preview',
    'keywords'          => array('faq'),
    'supports' => array('align' => false),
    'enqueue_assets'    => function () {
      wp_enqueue_style('go-faq',  get_template_directory_uri() . '/blocks/faq/faq.min.css');
      wp_enqueue_script('go-faq-init', get_template_directory_uri() . '/blocks/faq/faq.js', array('jquery'), '4', true);
    },
  ));
  acf_register_block_type(array(
    'name'              => 'faq-global',
    'title'             => __('FAQ'),
    'render_template'   => 'blocks/faq-global/faq-global.php',
    'category'          => 'formatting',
    'icon' => array(
      'background' => '#122b4f',
      'foreground' => '#fff',
      'src' => 'ellipsis',
    ),
    'mode'            => 'preview',
    'keywords'          => array('faq-global'),
    'supports' => array('align' => false),
    'enqueue_assets'    => function () {
      wp_enqueue_style('go-faq-global',  get_template_directory_uri() . '/blocks/faq-global/faq-global.min.css');
      wp_enqueue_script('go-faq-global-init', get_template_directory_uri() . '/blocks/faq-global/faq-global.js', array('jquery'), '4', true);
    },
  ));


  acf_register_block_type(array(
    'name'              => 'title',
    'title'             => __('Title'),
    'render_template'   => 'blocks/title/title.php',
    'category'          => 'formatting',
    'icon' => array(
      'background' => '#c80100',
      'foreground' => '#fff',
      'src' => 'ellipsis',
    ),
    'mode'            => 'preview',
    'keywords'          => array('Title'),
    'supports'    => [
      'align'      => true,
      'anchor'    => true,
      'customClassName'  => true,
      'jsx'       => false,
    ],
    'enqueue_assets'    => function () {
      wp_enqueue_style('go-title',  get_template_directory_uri() . '/blocks/title/title.min.css');
    },
  ));


  acf_register_block_type(array(
    'name'              => 'button-link',
    'title'             => __(' Przycisk '),
    'render_template'   => 'blocks/button/button.php',
    'category'          => 'formatting',
    'icon' => array(
      'background' => '#c80100',
      'foreground' => '#fff',
      'src' => 'ellipsis',
    ),
    'mode'            => 'preview',
    'keywords'          => array('przycisk'),
    'supports' => array('align' => true),
    'enqueue_assets'    => function () {
      wp_enqueue_style('go-button',  get_template_directory_uri() . '/blocks/button/button.min.css');
    },
  ));
}
if (function_exists('acf_register_block_type')) {
  add_action('acf/init', 'register_acf_block_types');
}

add_filter('acf/settings/save_json', 'my_acf_json_save_point');

function my_acf_json_save_point($path)
{
  // Update path
  $path = get_template_directory() . '/blocks/acf-json';
  // Return path
  return $path;
}
