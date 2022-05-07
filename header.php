<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package profolio
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
		
		<link rel="profile" href="https://gmpg.org/xfn/11">
		
		<?php wp_head(); ?>
    </head>

<body <?php body_class(); ?> data-spy="scroll" data-target=".navbar" data-offset="51">
<?php wp_body_open(); ?>
		<?php get_theme_mod( 'profolio_navbar_color_opacity' ) ? $navbar_color_opacity = '33' : $navbar_color_opacity = ''; ?>
        <!-- Nav Bar Start -->
        <div class="navbar navbar-expand-lg bg-light navbar-light" style="background:<?php if ( get_theme_mod( 'profolio_navbar_color' ) ) : echo get_theme_mod( 'profolio_navbar_color' ) . $navbar_color_opacity ; else: echo '#ef233c' . $navbar_color_opacity ; endif; ?> !important;">
			<a href="<?php echo get_site_url(); ?>" class="navbar-brand"><?php if ( get_theme_mod( 'profolio_logo_image' ) ) : echo '<img src="' . get_theme_mod( 'profolio_logo_image' ) . '" alt="logo" class="logo">'; else: echo bloginfo( 'name' ); endif; ?></a>
			<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="navbar-toggler-icon"></span>
			</button>
			<?php
				$navbar_side = 'ml-auto';
				if ( get_theme_mod( 'profolio_navbar_side' ) ) : $navbar_side = get_theme_mod( 'profolio_navbar_side' ); else: $navbar_side = 'ml-auto'; endif;
				wp_nav_menu( [
					'theme_location'  => 'primary',
					'depth'           => 2,
					'container'       => 'div',
					'container_class' => 'collapse navbar-collapse justify-content-between',
					'container_id'    => 'bs-example-navbar-collapse-1',
					'menu_class'      => 'navbar-nav ' . $navbar_side . ' text-right',
					'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
					'walker'          => new WP_Bootstrap_Navwalker(),
				] );
			?>
        </div>
        <!-- Nav Bar End -->
