<?php
/**
 * Blog Archive Template
 *
 */
?>
<?php get_header(); ?>
	<div id="content">
		<h2>Blog</h2>
		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
			<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a> <span class="date"><?php the_time('M j') ?></spam></h3>
			<div class="entry">
				<?php the_content('Read the rest of this entry &raquo;'); ?>
			</div>
			<p class="postmeta"><strong>Posted in</strong> <?php the_category(', '); ?> | <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></p>
		</div>
		<?php endwhile; ?>
		<?php if (  $wp_query->max_num_pages > 1 ) : ?>
			<p><?php next_posts_link('&larr; Older posts'); ?> <?php previous_posts_link(' | Newer posts &rarr;'); ?></p>
		<?php endif; ?>
		<?php else : ?>
		<h2>Not Found</h2>
		<p>Sorry, but you are looking for something that isn't here.</p>
		<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>