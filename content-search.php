<?php
/**
 * The template used for displaying page content in search.php
 */
?>
<div class="entry">
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry__article' ); ?>>
		<div class="entry-content">
			<div class="entry-summary">
				<?php anva_excerpt(); ?>
				<a class="btn btn-default" href="<?php the_permalink(); ?>">
					<?php echo anva_get_local( 'read_more' ); ?>
				</a>
			</div><!-- .entry-summary (end) -->
			<div class="clearfix"></div>
		</div><!-- .entry-content (end) -->
	</article><!-- #post-<?php the_ID(); ?> -->
</div><!-- .article-wrapper (end) -->
