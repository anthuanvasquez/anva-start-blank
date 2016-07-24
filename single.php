<?php
/**
 * The template file for single posts.
 */

get_header();
?>

<div class="container clearfix">
	<div class="content-area">
		
		<?php anva_post_before(); ?>

		<?php while ( have_posts() ) : the_post(); ?>
		
			<?php get_template_part( 'content', 'single' ); ?>
		
		<?php anva_post_after(); ?>

			<?php
				$single_comment = anva_get_option( 'single_comment' );
				if( 1 == $single_comment ) :
					if( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				endif;
			?>

		<?php endwhile; ?>

		</div><!-- .main (end) -->
	</div><!-- .content-area (end) -->
	
	<?php anva_sidebars( 'right', '4' ); ?>
	
</div><!-- .container (end) -->

<?php get_footer(); ?>
