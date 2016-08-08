<?php
/**
 * The template used for displaying page content in search.php
 */
?>
<div class="entry">
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry__article' ); ?>>
		<div class="entry__content">
			<?php anva_excerpt(); ?>
			<a class="button button-blue" href="<?php the_permalink(); ?>">
				<?php echo anva_get_local( 'read_more' ); ?>
			</a>
		</div><!-- .entry__content (end) -->
	</article><!-- #post-<?php the_ID(); ?> (end) -->
</div><!-- .entry (end) -->
