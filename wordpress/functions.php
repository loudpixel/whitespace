<?php
/**
 * Whitespace Intelligentsia functions
 *
 * Sets up the theme and provides helper functions for various features
 *
 */

/**
 * Tell WordPress to run ws_intelligentsia_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'ws_intelligentsia_setup' );

if ( ! function_exists( 'ws_intelligentsia_setup' ) ):
/**
 * Sets up theme defaults and registers support for WordPress features.
 */
function ws_intelligentsia_setup() {
	
	if ( ! isset( $content_width ) ) $content_width = 852;
	
	define( 'HEADER_TEXTCOLOR', '' );
	define( 'HEADER_IMAGE', '%s/images/logo-placeholder.png' );
	define( 'HEADER_IMAGE_WIDTH', 210 );
	define( 'HEADER_IMAGE_HEIGHT', 100 );
	define( 'NO_HEADER_TEXT', true );
	
	add_theme_support('automatic-feed-links');
	add_custom_image_header("", 'ws_intelligentsia_custom_admin_style');
	register_nav_menu( 'main_navigation', 'Main Navigation' );
	
}
endif;

/**
 * Actions and filters for the theme options and custom CSS
 */
add_action('init', 'ws_intelligentsia_js');
add_action('admin_init', 'ws_intelligentsia_custom_admin_style');
add_action( 'admin_init', 'ws_intelligentsia_theme_options_init' );
add_action( 'admin_menu', 'ws_intelligentsia_theme_options_add_page' );
add_action('template_redirect', 'ws_intelligentsia_css_display');
add_filter('query_vars', 'ws_intelligentsia_var');


/**
 * Register the homepage dynamic "sidebar"
 */
register_sidebar( array(
	'name' => 'Homepage Third',
	'id' => 'homepage-third',
	'before_widget' => '<aside>',
	'after_widget' => "</aside>",
	'before_title' => '<h2>',
	'after_title' => '</h2>',
) );


/**
 * Use Google CDN JQuery 1.4.3 instead of the default 1.6.x
 */
function ws_intelligentsia_js() {
	if (!is_admin()) {
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js');
		wp_register_script('nivo_slider',
			get_template_directory_uri() . '/scripts/jquery.nivo.slider.pack.js',
			array('jquery'),
			'1.4.3' );
	}
}    

/**
 * Register custom admin styles
 */
function ws_intelligentsia_custom_admin_style() {
	wp_register_style('admin_style', 	get_template_directory_uri().'/admin.css');
	wp_enqueue_style('admin_style');
}

/**
 * Register theme options
 */
function ws_intelligentsia_theme_options_init() {
	register_setting( 'ws_intelligentsia_options', 'ws_intelligentsia_theme_options', 'ws_intelligentsia_theme_options_validate' );
}

/**
 * Create a new admin options page to control custom theme options
 */
function ws_intelligentsia_theme_options_add_page() {
	add_theme_page( __( 'Theme Options' ), __( 'Theme Options' ), 'edit_theme_options', 'ws_intelligentsia_theme_options', 'ws_intelligentsia_theme_options_do_page' );
}

/**
 * Create the admin options page
 */
function ws_intelligentsia_theme_options_do_page() {

	if ( ! isset( $_REQUEST['settings-updated'] ) ) {
		$_REQUEST['settings-updated'] = false;
	} ?>
	<div class="wrap">
		<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Theme Options' ) . "</h2>"; ?>

		<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated fade"><p><strong>Theme settings saved!</strong></p></div>
		<?php endif; ?>

		<form method="post" action="options.php">
			<h3>Style Options</h3>
			<?php settings_fields( 'ws_intelligentsia_options' ); ?>
			<?php $options = get_option( 'ws_intelligentsia_theme_options' ); ?>
			<p><label class="description" for="ws_intelligentsia_theme_options[accent_color]">Accent Color</label><br /><input id="ws_intelligentsia_theme_options[accent_color]" type="text" name="ws_intelligentsia_theme_options[accent_color]" value="<?php esc_attr_e( $options['accent_color'] ); ?>" /></p>
			<p><label class="description" for="ws_intelligentsia_theme_options[link_color]">Link Color</label><br /><input id="ws_intelligentsia_theme_options[link_color]" type="text" name="ws_intelligentsia_theme_options[link_color]" value="<?php esc_attr_e( $options['link_color'] ); ?>" /></p>
			<h3>Site Options</h3>
			<p><label class="description" for="ws_intelligentsia_theme_options[copyright]">Copyright</label><br /><input id="ws_intelligentsia_theme_options[copyright]" type="text" name="ws_intelligentsia_theme_options[copyright]" value="<?php esc_attr_e( $options['copyright'] ); ?>" size="100" /></p>
			<h3>Social Links</h3>
			<p><label class="description" for="ws_intelligentsia_theme_options[facebook]">Facebook URL</label><br /><input id="ws_intelligentsia_theme_options[facebook]" type="text" name="ws_intelligentsia_theme_options[facebook]" value="<?php esc_attr_e( $options['facebook'] ); ?>" size="50" /></p>
			<p><label class="description" for="ws_intelligentsia_theme_options[twitter]">Twitter URL</label><br /><input id="ws_intelligentsia_theme_options[twitter]" type="text" name="ws_intelligentsia_theme_options[twitter]" value="<?php esc_attr_e( $options['twitter'] ); ?>" size="50" /></p>
			<p><label class="description" for="ws_intelligentsia_theme_options[flickr]">Flickr URL</label><br /><input id="ws_intelligentsia_theme_options[flickr]" type="text" name="ws_intelligentsia_theme_options[flickr]" value="<?php esc_attr_e( $options['flickr'] ); ?>" size="50" /></p>
			<p><label class="description" for="ws_intelligentsia_theme_options[formspring]">Formspring URL</label><br /><input id="ws_intelligentsia_theme_options[formspring]" type="text" name="ws_intelligentsia_theme_options[formspring]" value="<?php esc_attr_e( $options['formspring'] ); ?>" size="50" /></p>
			<p><label class="description" for="ws_intelligentsia_theme_options[pin]">Pinterest URL</label><br /><input id="ws_intelligentsia_theme_options[pin]" type="text" name="ws_intelligentsia_theme_options[pin]" value="<?php esc_attr_e( $options['pin'] ); ?>" size="50" /></p>
			<p class="submit"><input type="submit" class="button-primary" value="Save Options" /></p>
		</form>
	</div>
	<?php
}

/**
 * Sanitize and validate input (safety first!)
 */
function ws_intelligentsia_theme_options_validate( $input ) {
	$input['accent_color'] = wp_filter_nohtml_kses( $input['accent_color'] );
	$input['link_color'] = wp_filter_nohtml_kses( $input['link_color'] );
	$input['copyright'] = wp_filter_nohtml_kses( $input['copyright'] );
	$input['facebook'] = esc_url_raw( $input['facebook'] );
	$input['twitter'] = esc_url_raw( $input['twitter'] );
	$input['flickr'] = esc_url_raw( $input['flickr'] );
	$input['formspring'] = esc_url_raw( $input['formspring'] );
	$input['pin'] = esc_url_raw( $input['pin'] );
	return $input;
}

/**
 * Custom variable for user-controlled CSS
 */
function ws_intelligentsia_var($public_query_vars) {
    $public_query_vars[] = 'ws_intelligentsia_custom_var';
    return $public_query_vars;
}

/**
 * Use custom CSS
 */
function ws_intelligentsia_css_display() {
    $css = get_query_var('ws_intelligentsia_custom_var');
    if ($css == 'css') {
        include_once (TEMPLATEPATH . '/style-options.php');
        exit;  //This stops WP from loading any further
    }
}

/**
 * Retrieve a category ID based on the name
 */
function get_category_id($cat_name) {
	$term = get_term_by('name', $cat_name, 'category');
	if ($term) {
		return $term->term_id;
	} else {
		return 0;
	}
}
