<?php
/**
 * Page Template
 *
 * All static page (non post pages).
 */
?>
<?php get_header(); ?>
	<div id="content" class="page">
		<?php while ( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2><?php the_title(); ?></h2>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</div>
		<?php endwhile; ?>
	</div>
</div>
<?php get_footer(); ?>