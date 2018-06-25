<?php 
function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'style-name', get_stylesheet_uri() );
    wp_enqueue_script( 'script-name', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );


function register_my_menus() {
  register_nav_menus(
    array(
      'new-menu' => __( 'New Menu' ),
      'another-menu' => __( 'Another Menu' ),
      'an-extra-menu' => __( 'An Extra Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );


function create_post_type() {
  register_post_type( 'acme_product',
    array(
      'labels' => array(
        'name' => __( 'Services' ),
        'singular_name' => __( 'Services' )
      ),
      'public' => true,
      'has_archive' => true,
	  'taxonomies' => array('category','post_tag'),
	  'supports' => array('title','editor','thumbnail'),
    )
  );
}
add_action( 'init', 'create_post_type' );
?>
