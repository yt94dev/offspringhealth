<?php
add_theme_support( 'post-thumbnails' );


    
 
function my_pre_get_posts($query) {
    
        if( is_admin()) return;
    
        if( is_search() && $query->is_main_query() ) {
            
            $query->set('post_type', 'post');
            
        }
    
    }
    
    add_action( 'pre_get_posts', 'my_pre_get_posts' );

add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}




function register_print_script() {
    wp_register_script('pr_print_js', get_stylesheet_directory_uri().'/libs/print/jQuery.print.js');
}
function add_print_script() {
    if( 'post' == get_post_type() ){
    
        wp_enqueue_script( 'pr_print_js', get_stylesheet_directory_uri().'/libs/print/jQuery.print.js', array('jquery', 'common'), '1.0.0', true);
    }
    
}



add_action( 'init', 'register_print_script' );
add_action('wp_enqueue_scripts', 'add_print_script');


/**
 * -----------------------
 * TINYMCE STYLES DROPDOWN
 * -----------------------
 */
/*
 Add style select dropdown to tinymce
*/
add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );
function my_mce_buttons_2( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
/*
 Create some tinymce style definitions for the dropdown
*/
add_filter( 'tiny_mce_before_init', 'my_mce_before_init' );
function my_mce_before_init( $settings ) {
 $style_formats = array(
        array(
        	'title' => 'font-weight:300',
            'inline' => 'span',
        	'styles' => array(
        		'fontWeight' => '300'
        	)
        ),
        array(
        	'title' => 'font-weight:700',
            'inline' => 'span',
        	'styles' => array(
        		'fontWeight' => '700'
        	)
        ),
        array(
        	'title' => 'border-left: 3px solid #dcdcdc',
            'inline' => 'span',
        	'styles' => array(
            'border-left' => '3px solid #dcdcdc',
                'padding-left' => '18px',
                'display' => 'inline-block'
        	)
        ),
        array(
        	'title' => 'border-top',  
			'inline' => 'span',
			'classes' => 'border-top-article',
        )
    );
    
    $settings['style_formats'] = json_encode( $style_formats );
    return $settings;
}


add_filter( 'tiny_mce_before_init', 'fb_mce_before_init' );
function fb_mce_before_init( $settings ) {
    
        $font_formats = 'Montserrat=Montserrat, sans-serif; '. 'Lato=Lato, sans-serif;'. 'Andale Mono=andale mono,times;'. 'Arial=arial,helvetica,sans-serif;'. 'Arial Black=arial black,avant garde;'. 'Book Antiqua=book antiqua,palatino;'. 'Comic Sans MS=comic sans ms,sans-serif;'. 'Courier New=courier new,courier;'. 'Georgia=georgia,palatino;'. 'Helvetica=helvetica;'. 'Impact=impact,chicago;'. 'Symbol=symbol;'. 'Tahoma=tahoma,arial,helvetica,sans-serif;'. 'Terminal=terminal,monaco;'. 'Times New Roman=times new roman,times;'. 'Trebuchet MS=trebuchet ms,geneva;'. 'Verdana=verdana,geneva;'. 'Webdings=webdings;'. 'Wingdings=wingdings,zapf dingbats';
        $settings[ 'font_formats' ] = $font_formats;
    
        return $settings;
    
}

function custom_admin_post_thumbnail_html( $content ) {
    return $content = str_replace( __( 'Add Photo' ), __( 'Set thumbnail image' ), $content);
}
add_filter( 'admin_post_thumbnail_html', 'custom_admin_post_thumbnail_html' );

add_filter( 'admin_post_thumbnail_html', 'add_featured_image_instruction');
function add_featured_image_instruction( $content ) {
    return $content .= '<p>The Featured Image is an image that is chosen as the representative image for Posts or Pages. Click the link above to add or change the image for this post. Recommended size is 256х256 pixels </p>';
}

function register_header_menu() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_header_menu' );

wp_enqueue_script('jquery');



function offspr_init() {
    $tm_labels = array(
        'name' => __( 'Team Members', 'offspringhealth' ),
        'singular_name' => __( 'Member', 'offspringhealth' ),
        'add_new' => __( 'Add Member', 'offspringhealth' ),
        'add_new_item' => __( 'Add New Member', 'offspringhealth' ),
        'edit_item' => __( 'Edit Member', 'offspringhealth' ),
        'new_item' => __( 'New Member', 'offspringhealth' ),
        'view_item' => __( 'View Member', 'offspringhealth' ),
        'featured_image' => __( 'Photo', 'offspringhealth' ),
        'set_featured_image' => __( 'Add Photo', 'offspringhealth' ),
        'remove_featured_image' => __( 'Remove Photo', 'offspringhealth' )
    );

    $tm_args = array(
        'labels' => $tm_labels,
        'public' => true,
        'exclude_from_search' => true,
        'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes'),
        'rewrite' => ['slug'=>'professional'],
        'hierarchical' => false
    );

    register_post_type( 'team_members', $tm_args );

   
    
        $cb_labels = array(
            'name' => __( 'Color Boxes', 'offspringhealth' ),
            'singular_name' => __( 'Color Box', 'offspringhealth' ),
            'add_new' => __( 'Add Color Box', 'offspringhealth' ),
            'add_new_item' => __( 'Add New Color Box', 'offspringhealth' ),
            'edit_item' => __( 'Edit Color Box', 'offspringhealth' ),
            'new_item' => __( 'New Color Box', 'offspringhealth' ),
            'view_item' => __( 'View Color Box', 'offspringhealth' )
        );
    
        $cb_args = array(
            'labels' => $cb_labels,
            'public' => true,
            'exclude_from_search' => true,
            'publicly_queryable' => true,
            'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
            'rewrite' => ['slug'=>'we-do'],
            
        );

        register_post_type( 'color_boxes', $cb_args );

        $cbc_labels = array(
            'name' => __( 'Categories', 'offspringhealth' ),
            'singular_name' => __( 'Category', 'offspringhealth' ),
            'search_items' => __( 'Search Categories', 'offspringhealth' ),
            'popular_items' => __( 'Popular Categories', 'offspringhealth' ),
            'all_items' => __( 'All Categories', 'offspringhealth' ),
            'add_new_item' => __( 'Add New Category', 'offspringhealth' ),
            'new_item_name' => __( 'New Category Name', 'offspringhealth' ),
            'update_item' => __( 'Update Category', 'offspringhealth' ),
            'edit_item' => __( 'Edit Category', 'offspringhealth' ),
            'view_item' => __( 'View Category', 'offspringhealth' ),
            'separate_items_with_commas' => __( 'Separate categories with commas', 'offspringhealth' ),
            'add_or_remove_items' => __( 'Add or remove categories', 'offspringhealth' ),
            'choose_from_most_used' => __( 'choose from the most used categories', 'offspringhealth' )
        );
    
        $cbc_args = array(
            'labels' => $cbc_labels,
            'public' => false,
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => false,
            'rewrite' => false,
            'query_var' => false,
            'show_admin_column' => true
        );
        register_taxonomy( 'color_boxes_cat', array( 'color_boxes' ), $cbc_args );
}

add_action( 'init', 'offspr_init' );


function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyC-6__7dHG5IBa1hfP3pfEd1Z0mPuBzMOQ';
    return $api;
    }
    add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

// Adding isinviewport script
function register_isinviewport_script() {
    wp_register_script('pr_isinviewport_js', get_stylesheet_directory_uri().'/libs/isInViewport/isInViewport.js');
}
function add_isinviewport_script() {
    
        wp_enqueue_script( 'pr_isinviewport_js', get_stylesheet_directory_uri().'/libs/isInViewport/isInViewport.js', array('jquery', 'common'), '1.0.0', true);
    
}
add_action( 'init', 'register_isinviewport_script' );
add_action('wp_enqueue_scripts', 'add_isinviewport_script');




// Adding particles script
function register_easinfg_script() {
    wp_register_script('pr_easinfg_js', get_stylesheet_directory_uri().'/libs/parallax/jquery.easing.1.3.js');
}
function add_easinfg_script() {
    
        wp_enqueue_script( 'pr_easinfg_js', get_stylesheet_directory_uri().'/libs/parallax/jquery.easing.1.3.js', array('jquery', 'common'), '1.0.0', true);
    
}
add_action( 'init', 'register_easinfg_script' );
add_action('wp_enqueue_scripts', 'add_easinfg_script');




function register_particles_script() {
    wp_register_script('pr_particles_js', get_stylesheet_directory_uri().'/libs/parallax/jquery.jkit.js');
}
function add_particles_script() {
    
        wp_enqueue_script( 'pr_particles_js', get_stylesheet_directory_uri().'/libs/parallax/jquery.jkit.js', array('jquery', 'common'), '1.0.0', true);
    
}
add_action( 'init', 'register_particles_script' );
add_action('wp_enqueue_scripts', 'add_particles_script');




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
