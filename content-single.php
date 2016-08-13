<?php
/**
 * The template used for displaying single post content in single.php
 */
?>
<div class="entry">
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry__article' ); ?>>
		<?php echo anva_post_thumbnails( anva_get_option( 'single_thumb' ) ); ?>
		<div class="entry__title">
			<h1 class="entry__heading">
				<?php the_title(); ?>
			</h1>
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
			<?php the_content(); ?>
			<?php anva_post_nav(); ?>
		</div>
	</article>
</div><!-- .entry (end) -->
