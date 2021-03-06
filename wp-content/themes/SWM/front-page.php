<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 */

get_header(); ?>

	<?php if ( have_posts() ) : ?>
		<div class="container-fluid front-page-wrap" style="background-image: url('<?php echo get_field('home_background')?>');">
			<div class="row">
				<div class="container" >
					<?php
					// Start the loop.
					while ( have_posts() ) : the_post();

						the_content();

					// End the loop.
					endwhile; ?>
				</div>
			</div>
		</div>
	<?php endif;
	?>
<?php get_footer(); ?>
