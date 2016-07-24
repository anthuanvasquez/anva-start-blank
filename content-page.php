<?php
/**
 * The template used for displaying page content in page.php
 */
?>
<div class="entry">
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry__wrap' ); ?>>
		<div class="entry__content">
			<?php the_content(); ?>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
</div><!-- .entry (end) -->
