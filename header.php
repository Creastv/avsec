<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary">Przejdź do treści</a>

        <header id="masthead" class="site-header">
            <div class="container-full site-header-inner">
                <div class="header-content">
                    <div class="header-content-left">
                        <?php get_template_part('template-parts/header/header', 'brand'); ?>
                        <?php get_template_part('template-parts/header/header', 'small-nav'); ?>
                    </div>
                    <div class="header-content-right">
                        <?php get_template_part('template-parts/header/header', 'extras'); ?>
                    </div>
                </div>

            </div>
            <?php get_template_part('template-parts/header/header', 'nav'); ?>
        </header>

        <div id="content" class="site-content">