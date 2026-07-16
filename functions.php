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

    wp_enqueue_script(
        'stn-animations',
        get_stylesheet_directory_uri() . '/js/stn-animations.js',
        [],
        wp_get_theme()->get('Version'),
        true
    );
});

add_action('astra_content_top', function () {
    if (!is_category() && !is_tag() && !is_author()) {
        return;
    }
    echo '<header class="stn-archive-header"><h1 class="stn-archive-title">' . get_the_archive_title() . '</h1>';
    $description = get_the_archive_description();
    if ($description) {
        echo '<div class="stn-archive-description">' . wp_kses_post($description) . '</div>';
    }
    echo '</header>';
});
