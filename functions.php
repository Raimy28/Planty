<?php
/**
 * Recommended way to include parent theme styles.
 * (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
 *
 */  

 add_action( 'wp_enqueue_scripts', 'hello_elementor_child_style', 20 );

 function hello_elementor_child_style() {
	 wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	 wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'), filemtime(get_stylesheet_directory() . '/style.css') );
 }


 // Fonction pour charger Google Fonts
function ctc_enqueue_fonts() {
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Kalam:wght@300;400;700&family=Syne:wght@400..800&display=swap', false);
}
add_action('wp_enqueue_scripts', 'ctc_enqueue_fonts');
/**
 * Your code goes below.
 */

