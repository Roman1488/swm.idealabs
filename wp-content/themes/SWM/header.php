<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="stylesheet" type="text/css" href="https://cloud.typography.com/7299932/7854992/css/fonts.css" />
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon_128x128.png" />
<?php if(is_front_page()) { ?>
	<title><?php echo get_bloginfo('name') ?></title>
<?php } else { ?>
	<title><?php wp_title(false) ?></title>
<?php } ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="wrapper">
	<header id="header">
		<div class="container">
			<div class="row">
				<div class="logo-wrap col-4">
					<div class='logo'>
						<?php if (get_custom_logo())  {
								echo get_custom_logo(); 
							}
							if ($header_text = get_field('header_text', 'option')) {
								echo "<span class='logo_text'>".$header_text."</span>";
							}
						?>
					</div>
				</div>
				<div class="menu-wrap col-8">
					<?php if ( has_nav_menu( 'top' ) ) : ?>
						<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
							<i class="fa fa-bars"></i>
							<i class="fa fa-close"></i>
						</button>
						<div class="navigation-top">
							<div class="wrap">
								<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
							</div><!-- .wrap -->
						</div><!-- .navigation-top -->
					<?php endif; ?>
				</div>
			</div>
		</div>
	</header>
	<div id="content">
		
