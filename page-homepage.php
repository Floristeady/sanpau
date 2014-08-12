<?php
/**
 * Template Name: P&aacute;gina de inicio
 * @package WordPress
 * @subpackage sanpau
 * @since sanpau 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">

		<div id="home-slider" class="flexslider">
			
			<div class="row text">
				
				<?php  $rows = get_field('listado_palabra');  ?>
				<?php if($rows) { ?>
				<div id="featured-module" class="column medium-offset-10 medium-2 right">
					<?php foreach($rows as $row) { ?>
					<h2><?php echo $row['palabra_o_frase'] ?></h2>
					<?php } ?>
					<?php if( get_field('boton_listado') ): ?>
					<a class="simple-button" title="Saber más" href="<?php the_field('boton_listado'); ?>"><?php if( get_field('texto_boton_listado') ): the_field('texto_boton_listado'); else : _e('Más Información','sanpau') ?> <?php endif;?></a>
					<?php endif;?>
				</div>
				<?php } ?>
				
			</div>
			
			<?php  $rows = get_field('slider_inicio');  ?>
			<?php if($rows) { ?>
			<ul class="slides">
				<?php foreach($rows as $row) { ?>
				<li>
					<div class="row text">
						<div class="text-inner column medium-7">
							<h1><?php echo $row['texto_principal'] ?></h1>
						</div>
					</div>
					<div class="back">
					
					<?php  if($row['imagen_grande']) {   
							$url = $row['imagen_grande'] ;
							$width = 1600; $height = 545; $crop = true; $retina = false;												$image = matthewruddy_image_resize( $url, $width, $height, $crop, $retina );
							if ( is_wp_error( $image ) ) {
							    echo $image->get_error_message();
							} else {
								echo '<img src="'. $image['url'] .'" alt="San Pau Consultores" />';
							}
						?>
					 	<?php } else { ?>
					 	<img src="<?php echo bloginfo('template_url'); ?>/images/test/defaultSlider.jpg" alt="San Pau Consultores" />
					 <?php } ?>
					</div>
			    </li>
			    <?php } ?>
			</ul>
			<?php } ?>

			<div class="row">
				<div class="figures"></div>
				<div class="isotipo"></div>
			</div>
			
			<div id="home-contact">
				<div class="row open-modal">
					<a href="#" data-reveal-id="box-contact" class="right" data-reveal><span></span>Contáctanos</a>
				</div>
			</div>
		</div>
		
		<div id="home-bottom">
			<div class="row">
				<div class="columns medium-3">
					<div class="text">
						<?php if( get_field('titulo_contenido') ): ?>
						<h3><?php the_field('titulo_contenido'); ?></h3>
						<?php else : _e('<h3>San Pau Consultores</h3>','sanpau') ?>
						<?php endif;?>
						<?php if( get_field('texto_corto_contenido') ): ?>
						<h5><?php the_field('texto_corto_contenido'); ?></h5>
						<?php endif;?>
					</div>
					<?php if( get_field('link_contenido') ): ?>
					<a class="simple-button" href="<?php the_field('link_contenido'); ?>" title="Saber más"><?php _e('Más Información','sanpau')?> </a>
					<?php endif;?>
				</div>
						
				<?php if( get_field('texto_columna_derecha_contenido') ): ?>			
				<div class="columns medium-offset-1 medium-6 right">
					<div class="inner-content">	
					<?php the_field('texto_columna_derecha_contenido'); ?>
					</div>
				</div>
				<?php endif;?>
				
			</div>
		
		</div>
				
	</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>