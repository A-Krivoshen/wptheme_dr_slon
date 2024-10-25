<?php
// Поддержка различных функций темы
function dr_slon_setup() {
    // Локализация
    load_theme_textdomain('dr_slon', get_template_directory() . '/languages');

    // Поддержка тега <title>
    add_theme_support('title-tag');

    // Поддержка миниатюр
    add_theme_support('post-thumbnails');

    // Поддержка пользовательского логотипа
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Поддержка различных форматов постов
    add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio'));

    // Регистрация меню
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'dr_slon'),
    ));
}
add_action('after_setup_theme', 'dr_slon_setup');

// Регистрация виджетов
function dr_slon_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'dr_slon'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'dr_slon'),
        'before_widget' => '<section id="%1$s" class="widget %2$s mb-4">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title h5">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'dr_slon_widgets_init');

// Загрузка стилей и скриптов
function dr_slon_scripts() {
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap', false);

    // Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');

    // Slick CSS
    wp_enqueue_style('slick-css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css');

    // AOS CSS
    wp_enqueue_style('aos-css', 'https://cdn.jsdelivr.net/npm/aos@next/dist/aos.css');

    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');

    // Основной стиль темы
    wp_enqueue_style('theme-style', get_stylesheet_uri());

    // jQuery
    wp_enqueue_script('jquery');

    // Bootstrap JS
    wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js', array('jquery'), null, true);

    // Slick JS
    wp_enqueue_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('jquery'), null, true);

    // AOS JS
    wp_enqueue_script('aos-js', 'https://cdn.jsdelivr.net/npm/aos@next/dist/aos.js', array(), null, true);

    // Пользовательский скрипт
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/custom.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'dr_slon_scripts');

// Настройки кастомайзера для футера и социальных сетей
function dr_slon_customize_register($wp_customize) {
    // Секция для настроек футера
    $wp_customize->add_section('footer_section', array(
        'title'    => __('Footer Settings', 'dr_slon'),
        'priority' => 120,
    ));

    // Настройка текста в футере
    $wp_customize->add_setting('footer_text', array(
        'default'           => '© ' . date('Y') . ' Все права защищены.',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_text', array(
        'label'   => __('Footer Text', 'dr_slon'),
        'section' => 'footer_section',
        'type'    => 'text',
    ));

    // Секция для ссылок социальных сетей
    $wp_customize->add_section('social_media_section', array(
        'title'    => __('Social Media Links', 'dr_slon'),
        'priority' => 130,
    ));

    // Настройки для Facebook
    $wp_customize->add_setting('facebook_url', array(
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('facebook_url', array(
        'label'   => __('Facebook URL', 'dr_slon'),
        'section' => 'social_media_section',
        'type'    => 'url',
    ));

    // Добавьте аналогичные настройки для других социальных сетей

    // Секция для опций темы
    $wp_customize->add_section('theme_options_section', array(
        'title'    => __('Theme Options', 'dr_slon'),
        'priority' => 140,
    ));

    // Настройка для включения/отключения переключателя темы
    $wp_customize->add_setting('enable_theme_switcher', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('enable_theme_switcher', array(
        'label'    => __('Enable Light/Dark Theme Switcher', 'dr_slon'),
        'section'  => 'theme_options_section',
        'type'     => 'checkbox',
    ));
}
add_action('customize_register', 'dr_slon_customize_register');

// Подключение класса Bootstrap NavWalker
require_once get_template_directory() . '/class-bootstrap-navwalker.php';

// Автоматические обновления темы
add_filter('auto_update_theme', '__return_true');
