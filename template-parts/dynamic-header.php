<?php
/**
 * The template for displaying header.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! hello_get_header_display() ) {
	return;
}

$is_editor = isset( $_GET['elementor-preview'] );
$site_name = get_bloginfo( 'name' );
$tagline   = get_bloginfo( 'description', 'display' );
$header_class = did_action( 'elementor/loaded' ) ? hello_get_header_layout_class() : '';
?>
<header id="site-header" class="site-header dynamic-header <?php echo esc_attr( $header_class ); ?>">
	<div class="header-inner">
		<div class="site-branding show-<?php echo esc_attr( hello_elementor_get_setting( 'hello_header_logo_type' ) ); ?>">
			<?php if ( has_custom_logo() && ( 'title' !== hello_elementor_get_setting( 'hello_header_logo_type' ) || $is_editor ) ) : ?>
				<div class="site-logo <?php echo esc_attr( hello_show_or_hide( 'hello_header_logo_display' ) ); ?>">
					<?php the_custom_logo(); ?>
				</div>
			<?php endif;

			if ( $site_name && ( 'logo' !== hello_elementor_get_setting( 'hello_header_logo_type' ) || $is_editor ) ) : ?>
				<div class="site-title <?php echo esc_attr( hello_show_or_hide( 'hello_header_logo_display' ) ); ?>">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr__( 'Home', 'hello-elementor' ); ?>" rel="home">
						<?php echo esc_html( $site_name ); ?>
					</a>
				</div>
			<?php endif;

			if ( $tagline && ( hello_elementor_get_setting( 'hello_header_tagline_display' ) || $is_editor ) ) : ?>
				<p class="site-description <?php echo esc_attr( hello_show_or_hide( 'hello_header_tagline_display' ) ); ?>">
					<?php echo esc_html( $tagline ); ?>
				</p>
			<?php endif; ?>
		</div>

		<!-- Section des liens de navigation à droite -->
		<div class="custom-menu-links">
			<a href="<?php echo esc_url( home_url( '/nous-rencontrer' ) ); ?>"><?php esc_html_e( 'Nous rencontrer', 'hello-elementor' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/admin' ) ); ?>"><?php esc_html_e( 'Admin', 'hello-elementor' ); ?></a>
			<a href="<?php echo esc_url( home_url( '/commander' ) ); ?>" class="order-button"><?php esc_html_e( 'Commander', 'hello-elementor' ); ?></a>
		</div>
	</div>
</header>

