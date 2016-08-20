<?php
/**
 * The template used for displaying page content in 404.php
 */
?>
<div class="entry">
	<article id="post-not-found" class="post post--not-found entry__article">
		<div class="entry__title">
			<h1 class="entry__heading">
				<?php echo anva_get_local( 'not_found' ); ?>
			</h1>
		</div>
		<div class="entry__content clearfix">
			<?php echo wpautop( anva_get_local( 'not_found_content' ) ); ?>
		</div>
	</article>
</div><!-- .entry (end) -->
