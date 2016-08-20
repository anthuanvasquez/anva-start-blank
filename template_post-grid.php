<?php
/**
 * Template Name: Post Grid
 *
 * The template used for displaying posts in grid
 */

get_header();

$hide_title   = anva_get_post_meta( '_hide_title' );
$grid_columns = anva_get_post_meta( '_grid_columns' );
$size         = 'grid_'. $grid_columns;
$columns      = '';

// Config grid
if ( 2 == $grid_columns ) {
	$columns = 6;
} elseif ( 3 == $grid_columns ) {
	$columns = 4;
} elseif ( 4 == $grid_columns ) {
	$columns = 3;
}

// Counter
$count = 0;

// Get posts
$the_query = anva_get_post();

?>

<div class="container clearfix">
	<div class="content-area content-area--full">
		<div class="primary-post-grid post-grid-paginated post-grid">	
			<?php if ( $the_query->have_posts() ) :
				while ( $the_query->have_posts()) : $the_query->the_post();

					$count++;

					if ( 0 == ( $count - 1 ) % $grid_columns || 1 == $grid_columns ) : ?>
						<div class="post-grid__row">
					<?php endif; ?>
						
					<div class="post-grid__item grid_<?php echo $columns; ?>">
						<div class="entry">
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry__article' ); ?>>
								<?php echo anva_post_grid_thumbnails( $size ); ?>
								<div class="entry__title">
									<h2 class="entry__heading">
										<a href="<?php the_permalink(); ?>">
											<?php the_title(); ?>
										</a>
									</h2>
								</div>
								<div class="entry__content clearfix">
									<?php anva_excerpt(); ?>
									<a class="button button--3d" href="<?php the_permalink(); ?>">
										<?php echo anva_get_local( 'read_more' ); ?>
									</a>
								</div>
							</article>
						</div>
					</div>
						
					<?php if ( 0 == $count % $grid_columns ) : ?>
						</div>
					<?php endif ?>

				<?php endwhile; ?>
				
				<?php wp_reset_query(); ?>
				
			<?php endif; ?>


		</div><!-- .primary-post-grid (end) -->
		
		<?php anva_num_pagination( $the_query->max_num_pages ); ?>

	</div><!-- .content-area (end) -->
</div><!-- .container (end) -->

<?php get_footer(); ?>
