<?php
/**
 * Template Name: P&aacute;gina listado (gris)
 * @package WordPress
 * @subpackage sanpau
 * @since sanpau 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
		<div id="content" class="site-content page-list-grey" role="main">
		
		<?php //include('inc/breadcrumbs.php'); ?>

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();?>

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
						</div><!--top-->

						
						<div class="entry-content row">
							    <div class="inner columns large-8 large-offset-2">
								<?php
									the_content();
									wp_link_pages( array(
										'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'sanpau' ) . '</span>',
										'after'       => '</div>',
										'link_before' => '<span>',
										'link_after'  => '</span>',
									) );
								 ?>
								
								<?php  $rows = get_field('listado_simple');  ?>
								<?php if($rows) { ?>
									<ul id="list-simple" class="row">
									<?php foreach($rows as $row) { ?>
										<li><?php echo $row['texto_listado_simple'] ?><span></span></li>
									<?php } ?>
									</ul>
								
								<?php }
								 
								edit_post_link( __( 'Edit', 'sanpau' ), '<span class="edit-link">', '</span>' );?>

							    </div>
						</div><!-- .entry-content -->

					</article><!-- #post-## -->


			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>