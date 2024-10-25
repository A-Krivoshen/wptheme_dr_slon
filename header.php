<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Поддержка схемы для SEO -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "<?php bloginfo('name'); ?>",
        "url": "<?php echo home_url(); ?>"
    }
    </script>

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <?php if (function_exists('the_custom_logo') && has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <a class="navbar-brand" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
            <?php endif; ?>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'dr_slon'); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_class'     => 'navbar-nav ml-auto',
                    'container'      => false,
                    'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'         => new WP_Bootstrap_Navwalker(),
                ));
                ?>
            </div>

            <?php
            // Проверяем, включён ли переключатель темы
            if (get_theme_mod('enable_theme_switcher', true)) : ?>
                <!-- Добавляем иконку переключения темы -->
                <div class="theme-switch-wrapper">
                    <button id="theme-switch" class="btn btn-link">
                        <span class="fas fa-moon"></span>
                    </button>
                </div>
            <?php endif; ?>
        </div>
    </nav>
