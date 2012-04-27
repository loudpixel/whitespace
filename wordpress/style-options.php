<?php
/**
 * Custom Style Controls
 *
 * This template renders as a CSS file and displays your custom site values.
 */

header('Content-type: text/css');
$options = get_option('ws_intelligentsia_theme_options');
?>

body {
	border-top: 10px solid #<?php echo esc_html($options['accent_color']); ?>;
}

a:link, a:visited {
	color: #<?php echo esc_html($options['link_color']); ?>;
}

header h1 a {
	background-image: url(<?php header_image(); ?>);
}