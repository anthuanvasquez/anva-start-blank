<?php
/**
 * The template for displaying Archives
 * Like category, tag, dates, post-formats, etc.
 */

get_header();
?>

<div class="container clearfix">
	<div class="content-area">
		<div class="archive-post-list post-list-paginated post-list">
			
			<?php if ( have_posts() ) : ?>
				
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'post' ); ?>
				<?php endwhile; ?>

				<?php anva_num_pagination(); ?>
			
			<?php else : ?>
			
				<?php get_template_part( 'content', 'none' ); ?>
			
			<?php endif; ?>

		</div><!-- .archive-post-list (end) -->
	</div><!-- .content-area (end) -->
	
	<?php anva_sidebars( 'right', '4' ); ?>
	
</div><!-- .container (end) -->

<?php get_footer(); ?>
