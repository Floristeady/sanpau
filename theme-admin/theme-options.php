<?php
/**
 * Theme Options
 *
 * @package WordPress
 * @subpackage sanpau
 */
 
function sanpau_admin_enqueue_scripts( $hook_suffix ) {
	if ( $hook_suffix != 'appearance_page_theme_options' )
		return;

	wp_enqueue_style( 'sanpau-theme-options', get_template_directory_uri() . '/theme-admin/theme-options.css', false );
	wp_enqueue_script( 'sanpau-theme-options', get_template_directory_uri() . '/theme-admin/theme-options.js', array( 'farbtastic' ) );
	wp_enqueue_style( 'farbtastic' );
}
add_action( 'admin_enqueue_scripts', 'sanpau_admin_enqueue_scripts' );
 
// Default options values
$sanpau_options = array(
	'custom_color' => '#009BC2',
	'custom_logo' => ''
);

if ( is_admin() ) : // Load only if we are viewing an admin page

function sanpau_register_settings() {
	// Register the settings
	register_setting( 'sanpau_theme_options', 'sanpau_options', 'sanpau_validate_options' );
}

add_action( 'admin_init', 'sanpau_register_settings' );


function sanpau_theme_options() {
	// Add theme options page to the addmin menu
	add_theme_page( __( 'Extra Options', 'sanpau'), __( 'Extra Options', 'sanpau'), 'edit_theme_options', 'theme_options', 'sanpau_theme_options_page');
}

add_action( 'admin_menu', 'sanpau_theme_options' );

// Function to generate options page
function sanpau_theme_options_page() {
	global $sanpau_options, $sanpau_categories, $sanpau_layouts;

	if ( ! isset( $_REQUEST['updated'] ) )
		$_REQUEST['updated'] = false; // This checks whether the form has just been submitted. ?>

	<div class="wrap">

	<?php screen_icon(); echo "<h2>"  . __( 'Opciones Extras para ', 'sanpau' ) . wp_get_theme() .  "</h2>";
	// This shows the page's name and an icon if one has been provided ?>

	<?php if ( false !== $_REQUEST['updated'] ) : ?>
	<div class="updated fade"><p><strong><?php _e( 'Options saved', 'sanpau' ); ?></strong></p></div>
	<?php endif; // If the form has just been submitted, this shows the notification ?>

	<form method="post" action="options.php">

	<?php $settings = get_option( 'sanpau_options', $sanpau_options ); ?>
	
	<?php settings_fields( 'sanpau_theme_options' );
	/* This function outputs some hidden fields required by the form,
	including a nonce, a unique number used to ensure the form has been submitted from the admin page
	and not somewhere else, very important for security */ ?>

	<table class="form-table">

	<tr valign="top"><th scope="row"><label for="custom_color"><?php _e('Custom Link Color', 'sanpau'); ?></label></th>
	<td>
	<input id="custom_color" name="sanpau_options[custom_color]" type="text" value="<?php  esc_attr_e($settings['custom_color']); ?>" />
	<a href="#" class="pickcolor hide-if-no-js" id="custom_color-example"></a>
	<input type="button" class="pickcolor button hide-if-no-js" value="<?php esc_attr_e( 'Select a Color', 'sanpau' ); ?>">
	<div id="colorPickerDiv" style="z-index: 100; background:#eee; border:1px solid #ccc; position:absolute; display:none;"></div>
	<br />
	<small class="description"><?php _e('e.g. #0000FF or blue (default link color: #009BC2)', 'sanpau'); ?></small>
	</td>
	</tr>
	
	<tr valign="top"><th scope="row"><label for="custom_logo"><?php _e('Custom Logo Image URL', 'sanpau'); ?></label></th>
	<td>
	<input id="custom_logo" name="sanpau_options[custom_logo]" type="text" value="<?php  esc_attr_e($settings['custom_logo']); ?>" />
	<span class="description"> <a href="<?php echo home_url(); ?>/wp-admin/media-new.php" target="_blank"><?php _e('Upload your own logo image', 'sanpau'); ?></a> <?php _e(' using the WordPress Media Library and insert the URL here', 'sanpau'); ?> </span>
	<br/><img style="margin-top: 10px;" src="<?php echo (get_option('custom_logo')) ? get_option('custom_logo') : get_template_directory_uri() . '/images/logo.png' ?>" />
	</td>
	</tr>
	</table>

	<p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" /></p>

	</form>

	</div>

	<?php
}

function sanpau_validate_options( $input ) {
	global $sanpau_options, $sanpau_categories, $sanpau_layouts;

	$settings = get_option( 'sanpau_options', $sanpau_options );
	
	// We strip all tags from the text field, to avoid vulnerablilties like XSS
	$input['custom_color'] = wp_filter_nohtml_kses( $input['custom_color'] );
	
	return $input;
}

endif;  // EndIf is_admin()


// Custom CSS for Link Colors
function insert_custom_color(){
?>

<?php 
	global $sanpau_options;
	$sanpau_settings = get_option( 'sanpau_options', $sanpau_options );
?>
<?php if( $sanpau_settings['custom_color'] != '' ) : ?>
<style type="text/css">
a {color: <?php echo $sanpau_settings['custom_color'] ; ?>!important;}
#content .single-entry-header h1.entry-title {color: <?php echo $sanpau_settings['custom_color'] ; ?>!important;}
input#submit:hover {background-color: <?php echo $sanpau_settings['custom_color'] ; ?>!important;}
#content .page-entry-header h1.entry-title {color: <?php echo $sanpau_settings['custom_color'] ; ?>!important;}
.searchsubmit:hover {background-color: <?php echo $sanpau_settings['custom_color'] ; ?>!important;}
</style>
<?php endif; ?>
<?php
}

add_action('wp_head', 'insert_custom_color');
