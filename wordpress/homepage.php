<?php
/**
 * Template Name: Static homepage
 *
 * If the blog is in a sub-directory (/blog), this page will act as the site index.
 */
?>
<?php get_header(); ?>
	<section id="showcase">
		<div id="nivo-slider">
			<?php
			$homepage_gallery_images =& get_children( 'post_type=attachment&post_mime_type=image&order=ASC' );
			foreach ( (array) $homepage_gallery_images as $attachment_id => $attachment ) {
				if (preg_match("/\bhomepage\b/i", $attachment->post_excerpt)) {
					echo "<img alt=\"\" src=\"" . wp_get_attachment_url($attachment_id) . "\" />";
				}
			}
			?>
		</div>
	</section>
	<section id="content">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; ?>
	</section>
	<section id="sidebar" class="featured">
	<?php if ( ! dynamic_sidebar( 'homepage-third' ) ) : ?>
		<?php if (get_category_id("featured")) { ?>
			<?php $myposts = get_posts('numberposts=4&category=' . get_category_id("featured") . '') ?>
			<h2>Featured</h2>
			<ul>
			<?php foreach( $myposts as $post ) :	setup_postdata($post); ?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			<?php endforeach; ?>
			</ul>
		<?php } ?>
	<?php endif; ?>
	</section>
</div>
<?php get_footer(); ?>