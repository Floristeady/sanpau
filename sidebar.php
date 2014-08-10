<?php
/**
 * The Sidebar containing the primary and secondary widget areas.
 *
 * @package WordPress
 * @subpackage sanpau
 * @since sanpau 1.0
 */
?>

<div id="sidebar">
			
	<?php

		if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>
		<div class="widget-list">
			<?php dynamic_sidebar( 'primary-widget-area' ); ?>
		</div>
		<?php endif; ?>
	
		<?php
		if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>
	
		<div class="widget-list">
			<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
		</div>
		<?php endif; ?>
	
		<?php
		if ( is_active_sidebar( 'products-widget-area' ) ) : ?>
			<div class="widget-list">
				<?php dynamic_sidebar( 'products-widget-area' ); ?>
			</div>
		<?php endif; ?>

</div>