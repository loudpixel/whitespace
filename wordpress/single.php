<?php
/**
 * Single Article Template
 *
 * When you click on a post, this template controls that display.
 */
?>
<?php get_header(); ?>
	<section id="content">
		<h2>Blog</h2>
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<h3><?php the_title(); ?> <span class="date"><?php the_time('M j') ?></span></h3>
			<div class="entry">
				<?php the_content(); ?>
				<?php wp_link_pages(); ?>
			</div>
			<p class="postmeta"><strong>Posted in</strong> <?php the_category(', '); ?></strong></p>
			<?php comments_template( '', true ); ?>
		</div>
			<p> <span class="nav-previous"><?php previous_post_link('%link', '&larr; %title'); ?></span><span class="nav-next"><?php next_post_link('%link', '%title &rarr;'); ?></span></p>
		<?php endwhile; ?>

		<?php else : ?>
		<h2>Not Found</h2>
		<p>Sorry, but you are looking for something that isn't here.</p>
		<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>
