<?php
/**
 * SoftTechNews Astra Child theme functions.
 */

add_action('wp_enqueue_scripts', function () {
    $parent_style = 'astra-theme-css';

    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');

    wp_enqueue_style(
        'stn-google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap',
        [],
        null
    );

    wp_enqueue_style(
        'stn-child-style',
        get_stylesheet_uri(),
        [$parent_style, 'stn-google-fonts'],
        wp_get_theme()->get('Version')
    );
});
