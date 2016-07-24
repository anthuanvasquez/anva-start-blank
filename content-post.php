<?php
/**
 * The default template for displaying content in blogroll.
 */
?>
<div class="entry">
	<article id="post-<?php the_ID(); ?>" <?php post_class('entry__article'); ?>>
		<?php echo anva_post_thumbnails( anva_get_option( 'posts_thumb' ) ); ?>
		<div class="entry__title">
			<h2 class="entry__heading">
				<a class="entry__link" href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h2>
		</div>
		<div class="entry__meta">
			<?php
				$single_meta = anva_get_option( 'single_meta' );
				if ( 1 == $single_meta ) :
					anva_posted_on();
				endif;
			?>
		</div>
		<div class="entry__content clearfix">
			<?php anva_excerpt(); ?>
			<a class="btn btn-default" href="<?php the_permalink(); ?>">
				<?php echo anva_get_local( 'read_more' ); ?>
			</a>
		</div>
	</article>
</div><!-- entry (end) -->
