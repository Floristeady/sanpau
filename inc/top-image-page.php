<?php if ( has_post_thumbnail()) { ?>
	<?php 	
		$domsxe = simplexml_load_string(get_the_post_thumbnail($post->ID, 'big'));
		$thumbnailsrc = "";
		if (!empty($domsxe))
			$thumbnailsrc = $domsxe->attributes()->src;
	 
		$url = $thumbnailsrc;
		$width = 1400; $height = 240; $crop = true; $retina = false;												$image = matthewruddy_image_resize( $url, $width, $height, $crop, $retina );							$title = get_the_title();
		if ( is_wp_error( $image ) ) {
		    echo $image->get_error_message();
		} else {
			echo '<img alt="'. $title .'" src="'. $image['url'] .'"/>';
		}
	?> 
<?php } else { ?>
	<img src="<?php echo bloginfo('template_url'); ?>/images/default/defaultTop.jpg" alt="<?php the_title(); ?>" />
<?php } ?>
