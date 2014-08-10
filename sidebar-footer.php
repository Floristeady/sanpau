<?php
/**
 * The Footer widget areas.
 *
 * @package WordPress
 * @subpackage sanpau
 * @since sanpau 1.0
 */
?>

<?php
	/* The footer widget area is triggered if any of the areas
	 * have widgets. So let's check that first.
	 *
	 * If none of the sidebars have widgets, then let's bail early.
	 */
	if (   ! is_active_sidebar( 'first-footer-widget-area'  )
		&& ! is_active_sidebar( 'second-footer-widget-area' )
	)
		return;
	// If we get this far, we have widgets. Let's do this.
?>

<?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
					<div class="widget-list widget-footer columns medium-5">
						<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
					</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'second-footer-widget-area' ) ) : ?>
					<div class="widget-list widget-footer widget-last columns medium-5">
						<?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
					</div>
<?php endif; ?>

