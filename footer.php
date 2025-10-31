    </div><!-- #content -->
    <?php get_template_part('template-parts/parts/partners'); ?>
    <?php get_template_part('template-parts/footer/footer-newsletter'); ?>

    <footer id="colophon" class="site-footer">
        <div class="container-full">
            <div class="footer-main">
                <div class="footer-column footer-column-brand">
                    <?php get_template_part('template-parts/footer/footer-brand'); ?>
                </div>
                <div class="footer-column footer-column-menus">
                    <?php get_template_part('template-parts/footer/footer-menus'); ?>
                </div>
            </div>

            <div class="site-info">
                <nav class="footer-bottom-menu">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'container' => false,
                        'menu_class' => 'footer-bottom-menu-list',
                        'fallback_cb' => false,
                    ));
                    ?>
                </nav>

                <p>
                    &copy; <?php echo date('Y'); ?>
                    <?php
                    echo esc_html__(
                        'Copywrite Avsec.pl Sp. z o.o - Wszelkie prawa zastrzeżone. Projekt i realizacja:',
                        'avsec'
                    );
                    ?>
                    <a href="https://creastv.pl" target="_blank"><b>Creastv.pl</b></a> |
                    <?php
                    echo esc_html__(
                        'Usługi marketingowe:',
                        'avsec'
                    );
                    ?>
                    <a href="https://managerka.com" target="_blank"><b>Managerka.com</b></a>
                </p>
            </div>
        </div>
    </footer>
    </div><!-- #page -->
    <?php get_template_part('template-parts/parts/sticky_social_media'); ?>
    <span id="go-to-top">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path id="Icon_material-arrow-upward" data-name="Icon material-arrow-upward"
                d="M6,18l2.115,2.115,8.385-8.37V30h3V11.745l8.37,8.385L30,18,18,6Z" transform="translate(-6 -6)" />
        </svg>
    </span>
    <?php wp_footer(); ?>

    </body>

    </html>