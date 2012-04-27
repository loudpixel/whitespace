<?php
/**
 * Template for posting and displaying comments
 *
 */
?>
<div id="comments">
	<?php if ( have_comments() ) : ?>
		<h3><?php comments_number( 'No responses', 'One response', '% responses' ); ?></h3>
		<ol class="commentlist">
			<?php wp_list_comments(); ?>
		</ol>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<span class="nav-previous"><?php previous_comments_link('&larr; Older Comments'); ?></span> <span class="nav-next"><?php next_comments_link('Newer Comments &rarr;'); ?></div>
		<?php endif; ?>
	<?php elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
		<p>Comments are closed.</p>
	<?php endif; ?>
	<?php comment_form(); ?>
</div>
