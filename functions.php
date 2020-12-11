<?php

// Include custom navwalker (per dinamicizzare menu)
require_once('assets/bs4navwalker.php');

//imposto content width
if ( ! isset( $content_width ) ) $content_width = 1400;

// setup theme
// se la funzione non esiste... la dichiaro qui
if(!function_exists('sonic_setup_theme')) {
    function sonic_setup_theme() {
        // supporto per i titoli dell'header in maniera automatica
        add_theme_support('title-tag');
        // supporto per i feed links
        add_theme_support( 'automatic-feed-links' );
        // supporto per l'immagine in evidenza per articoli e pagine
        add_theme_support('post-thumbnails');
        // aggiungo il supporto per le immagini - true mi croppa le immagini
        add_image_size('sonic_big', 1400, 800, true);
        add_image_size('sonic_quad', 600, 600, true);
        add_image_size('sonic_single', 800, 500, true);
        // menu customizzabile drag and drop (e supporto multilingua)
        register_nav_menus(array(
            'header' => esc_html__('Header', 'sonic'),
        ));
        // inseriamo le traduzioni
        load_theme_textdomain('sonic', get_template_directory().'/languages'); 
    }
}
add_action('after_setup_theme', 'sonic_setup_theme');

// Register Sidebars (creiamo la sidebar)
if(!function_exists('sonic_sidebars')) {

    function sonic_sidebars() {
        register_sidebar(array(
            'name' => esc_html__('Primary', 'sonic'),
            'id' => 'primary',
            'description' => esc_html__('Main Sidebar', 'sonic'),
            'before_title' => '<h3>',
            'after_title' => '</h3>',
            'before_widget' => '<div class="widget my-4 %2$s clearfix">',
            'after_widget' => '</div>'
        ));
    }
}
add_action('widgets_init', 'sonic_sidebars'); 


// include javascript files
if(!function_exists('sonic_scripts')) {
    function sonic_scripts() {
        wp_enqueue_script('sonic-popper-js', get_template_directory_uri() . '/js/popper.min.js', array('jquery'),null,true);
        wp_enqueue_script('sonic-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'),null,true);

        if ( is_singular() ) wp_enqueue_script( "comment-reply" );
    }
    add_action('wp_enqueue_scripts', 'sonic_scripts');
}

// includere foglio di stile
if(!function_exists('sonic_styles')) {
    function sonic_styles() {
        wp_enqueue_style('sonic-bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
        wp_enqueue_style('sonic-style-default-css', get_template_directory_uri() . '/style.css');
    }
    add_action('wp_enqueue_scripts', 'sonic_styles');
}

// add class to button submit (stilizzato bottone stile bootstrap)
function wpdocs_comment_form_defaults($defaults) {
    $defaults['class_submit'] = 'btn btn-primary btn-lg';
    return $defaults;
}

add_filter('comment_form_defaults', 'wpdocs_comment_form_defaults');

// wp body open
if ( ! function_exists( 'wp_body_open' ) ) {
    /**
     * Fire the wp_body_open action.
     *
     * Added for backwards compatibility to support WordPress versions prior to 5.2.0.
     */
    function wp_body_open() {
        /**
         * Triggered after the opening <body> tag.
         */
        do_action( 'wp_body_open' );
    }
}