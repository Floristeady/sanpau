<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage sanpau
 * @since sanpau 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div id="top-page">
	
		<div class="row text">
			
			<div class="title column large-6">
			
			<?php the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' ); 
			
				if (has_excerpt()) : ?>
				<div class="entry-excerpt">
					<?php the_excerpt(); ?>
				</div>
				<?php endif; ?>
				
			</div>
			
		</div>		
					
		<div class="back">
			<?php include('inc/top-image-page.php'); ?>
		</div>
	</div>

	<div class="entry-content row">
		<div class="inner columns large-8 large-offset-2">
		<div class="bullet"></div>
		<?php
			the_content();
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'sanpau' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );

			edit_post_link( __( 'Edit', 'sanpau' ), '<span class="edit-link">', '</span>' );
		?>
		</div>
	</div><!-- .entry-content -->
	
</article><!-- #post-## -->
