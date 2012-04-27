<?php
/**
 * Template Name: Portfolio Page
 *
 * Special template for slider-enabled WordPress pages
 */
?>
<?php get_header(); ?>
<section id="content">
	<h2><?php the_title(); ?></h2>
		<section id="showcase">
			<div id="nivo-slider">
				<?php
				$homepage_gallery_images =& get_children( 'post_type=attachment&post_mime_type=image&order=ASC' );
				foreach ( (array) $homepage_gallery_images as $attachment_id => $attachment ) {
					if (preg_match("/\bportfolio\b/i", $attachment->post_excerpt)) {
						echo "<img alt=\"\" src=\"" . wp_get_attachment_url($attachment_id) . "\" />";
					}
				}
				?>
			</div>
		</section>
<?php while ( have_posts() ) : the_post(); ?>
	<?php the_content(); ?>
<?php endwhile; ?>
</section>
</div>
<?php get_footer(); ?>