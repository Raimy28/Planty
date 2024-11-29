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


// Menu
function register_my_menus() {
    register_nav_menus(array(
        'primary' => __('Menu Principal', 'your-theme-textdomain'),
    ));
}
add_action('after_setup_theme', 'register_my_menus');


// Hook Admin
function add_admin_link_for_logged_in_users($items, $args) {
    if ($args->theme_location === 'primary') {
        if (is_user_logged_in()) {
            $admin_link = '<li class="menu-item admin-link"><a href="' . esc_url(home_url('/admin')) . '">Admin</a></li>';
            $items .= $admin_link;
        }
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'add_admin_link_for_logged_in_users', 10, 2);


// Responsive
function enqueue_menu_scripts() {
    wp_enqueue_script(
        'menu-responsive',
        get_stylesheet_directory_uri() . '/js/menu-responsive.js', // Chemin relatif au thème
        array(), // Dépendances (vide si aucune)
        '1.0', // Version
        true // Charge le script dans le footer
    );
}
add_action('wp_enqueue_scripts', 'enqueue_menu_scripts');
