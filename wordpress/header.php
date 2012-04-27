<?php
/**
 * Header Template
 *
 * Displays the proper HTML5 bits along with the masthead and navigation.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title( '|', true, 'right' ); ?> <?php bloginfo( 'name' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/stylesheets/screen.css" media="screen" />
	<link rel="stylesheet" href="<?php echo home_url(); ?>/?ws_intelligentsia_custom_var=css" type="text/css" media="screen" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php if ( is_front_page() || is_page_template('portfolio.php') || is_page_template('portfolio-alt.php') ) wp_enqueue_script( 'nivo_slider' ); ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="wrap">
		<header id="masthead">
			<h1><a title="<?php bloginfo( 'name' ); ?>" href="/"><?php bloginfo( 'name' ); ?></a></h1>
			<nav>
				<?php wp_nav_menu(array('container' => '')); ?>
			</nav>
			<?php $options = get_option('ws_intelligentsia_theme_options'); ?>
			<ul class="social">
				<?php if (!$options['twitter'] == '') { ?><li><a class="twitter" title="Twitter" href="<?php echo esc_url($options['twitter']); ?>">Twitter</a></li><?php } ?>
				<?php if (!$options['facebook'] == '') { ?><li><a class="facebook" title="Facebook" href="<?php echo esc_url($options['facebook']); ?>">Facebook</a></li><?php } ?>
				<?php if (!$options['flickr'] == '') { ?><li><a class="flickr" title="Flickr" href="<?php echo esc_url($options['flickr']); ?>">Flickr</a></li><?php } ?>
				<?php if (!$options['formspring'] == '') { ?><li><a class="formspring" title="Formspring" href="<?php echo esc_url($options['formspring']); ?>">Formspring</a></li><?php } ?>
				<?php if (!$options['pin'] == '') { ?><li><a class="pin" title="Pinterest" href="<?php echo esc_url($options['pin']); ?>">Pinterest</a></li><?php } ?>
				<li><a class="rss" title="" href="<?php bloginfo('rss2_url'); ?>">RSS Feed</a></li>
			</ul>
		</header>