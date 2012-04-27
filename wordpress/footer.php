<?php
/**
 * Footer Template
 *
 * Footer and copyright information along with gallery slider JavaScript calls.
 */
?>
	<footer>
		<div class="wrap">
			<h3><?php bloginfo( 'name' ); ?></h3>
			<?php $options = get_option('ws_intelligentsia_theme_options'); ?>
			<?php if (!$options['copyright'] == '') { ?><p><?php echo esc_html($options['copyright']); ?></p><?php } ?>
			<p>Powered by <a href="http://usewhitespace.com">Whitespace Intelligentsia</a></p>
		</div>
	</footer>
	<?php if (is_front_page() || is_page_template('portfolio.php') || is_page_template('portfolio-alt.php')) { ?>
	<script type="text/javascript">
	/* <![CDATA[ */
  $(window).load(function() {
      $('#nivo-slider').nivoSlider({
				effect: 'fade',
				animSpeed: 400,
				controlNav: false,
				pauseTime: 10000
			});
  });
	/* ]]> */
  </script>
	<?php } ?>
	<?php wp_footer(); ?>
</body>
</html>