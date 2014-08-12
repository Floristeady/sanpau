<?php
/**
 * @package WordPress
 * @subpackage sanpau
 * @since sanpau 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
		<div id="content" class="site-content page-01" role="main">
		
		<?php // include('inc/breadcrumbs.php'); ?>

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

				endwhile;
			?>

		</div>
	</div>

<?php get_footer(); ?>