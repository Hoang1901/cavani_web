<?php
//  Main menu
function mytheme_register_menus() {
    register_nav_menus(array(
        'main-menu' => __('Main Menu', 'mytheme'),
    ));
}
add_action('after_setup_theme', 'mytheme_register_menus');

//Enqueue styles
function mytheme_enqueue_styles() {
    wp_enqueue_style('mytheme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_styles');

// Enqueue scripts
function theme_scripts() {
    wp_enqueue_script('custom-slider', get_template_directory_uri() . '/script.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'theme_scripts');

