<?php

function bootstr_theme_support()
{
    // Dynamic Title tag
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme','bootstr_theme_support');

function boostr_menus(){
    $location = array(
        'primary' => 'Desktop Primary Left Side Bar',
        'footer' => 'Footer menu items'
    );

    register_nav_menus($location);
}

add_action('init','boostr_menus');

function bootstr_register_styles()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('bootstr_style', get_template_directory_uri() . "/style.css", array('bootstr_bootstrap'), $version, 'all');
    wp_enqueue_style('bootstr_bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css', array(), "5.3.0", "all");
    wp_enqueue_style('bootstr_fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css', array(), "6.2.1", "all");
}

add_action('wp_enqueue_scripts', 'bootstr_register_styles');

function bootstr_register_scripts()
{

    wp_enqueue_script('bootstr_jquery', "https://code.jquery.com/jquery-3.6.3.min.js", array(), '3.6.3', true);
    wp_enqueue_script('bootstr_popper', "https://unpkg.com/@popperjs/core@2", array(), '2.0', true);
    wp_enqueue_script('bootstr_bootstrapjs', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js', array(), "5.3.0", true);
    wp_enqueue_script('bootstr_script', get_template_directory_uri() . "/main.js", array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'bootstr_register_scripts');

function bootstr_widget_areas(){
    register_sidebar(
        [
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '<ul class="social-list list-inline py-3 mx-auto">',
            'after_widget' => '</ul>',

            'name' => 'Sider Area',
            'id' => 'sidebar-1',
            'description' => 'Sidebar widget area'
        ]
    );

    register_sidebar(
        [
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => '',

            'name' => 'Footer Area',
            'id' => 'footer-1',
            'description' => 'Sidebar footer area'
        ]
    );
}

add_action('widgets_init', 'bootstr_widget_areas');
