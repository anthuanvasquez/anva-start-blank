<?php
/**
 * The template used for displaying page content in search.php
 */
?>
<div class="entry">
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry__article' ); ?>>
		<div class="entry__content clearfix">
			<?php anva_excerpt(); ?>
			<a class="button button--read-more" href="<?php the_permalink(); ?>">
				<?php echo anva_get_local( 'read_more' ); ?>
			</a>
		</div>
	</article>
</div><!-- .entry (end) -->
