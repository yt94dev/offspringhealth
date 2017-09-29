<?php

function register_header_menu() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_header_menu' );

// -----------------------------  START   ----------- add scripts for owl carousel




function register_owlcarousel_stylesheet() {
    wp_register_style( 'stylesheet_name', get_stylesheet_directory_uri() . '/libs/owl-carousel/assets/owl.theme.default.css' );
}

function add_owlcarousel_stylesheet() {
    
    wp_enqueue_style( 'stylesheet_name' );  // no brackets needed for one line and no else
}
add_action( 'init', 'register_owlcarousel_stylesheet' ); // should I use wp_print_styles hook instead?
add_action( 'wp_enqueue_scripts', 'add_owlcarousel_stylesheet' );


function register_owlcarousel_script() {
    wp_register_script('pr_jcarousel_js', get_stylesheet_directory_uri().'/libs/owl-carousel/owl.carousel.min.js');
}
function add_owlcarousel_script() {
    
        wp_enqueue_script( 'pr_jcarousel_js', get_stylesheet_directory_uri().'/libs/owl-carousel/owl.carousel.min.js', array('jquery', 'common'), '1.0.0', true);
    
}
add_action( 'init', 'register_owlcarousel_script' );
add_action('wp_enqueue_scripts', 'add_owlcarousel_script');
// -----------------------------  END   ----------- add scripts for owl carousel


// -----------------------------  START   ----------- add common.js scripts
function register_commonjs_script() {
    wp_register_script('pr_commonjs_js',get_stylesheet_directory_uri().'/js/common.min.js');
}
function add_commonjs_script() {
        wp_enqueue_script( 'pr_commonjs_js', get_stylesheet_directory_uri().'/js/common.min.js', array('jquery'), '1.0.0', true);
}
add_action( 'init', 'register_commonjs_script' );
add_action('wp_enqueue_scripts', 'add_commonjs_script');
// -----------------------------  END   ----------- add common.js scripts




?>
