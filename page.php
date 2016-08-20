<?php
/**
 * The template file for page.
 */

$classes = '';
$sidebar = anva_get_post_meta( '_sidebar_column' );

if ( 'left' == $sidebar ) {
	$classes = 'content-area--sidebar-left';

} elseif ( 'right' == $sidebar ) {
	$classes = 'content-area--sidebar-right';

} elseif ( 'double' == $sidebar ) {
	$classes = 'content-area--both';

} elseif ( 'double_left' == $sidebar ) {
	$classes = 'content-area--both content-area--both-left';

} elseif ( 'double_right' == $sidebar ) {
	$classes = 'content-area--both content-area--both-right';

} elseif ( 'fullwidth' == $sidebar ) {
	$classes = 'content-area--full';

}

get_header();
?>

<div class="container clearfix">

	<?php do_action( 'anva_sidebar_layout_before' ); ?>

	<div class="content-area <?php echo esc_attr( $classes ); ?>">

			<?php do_action( 'anva_post_before' ); ?>

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>
			
				<?php do_action( 'anva_post_after' ); ?>

				<?php
					$single_comment = anva_get_option( 'single_comment' );
					if ( 1 == $single_comment ) :
						if ( comments_open() || '0' != get_comments_number() ) :
							comments_template();
						endif;
					endif;
				?>

			<?php endwhile; ?>

	</div><!-- .content-area (end) -->
	
	<?php do_action( 'anva_sidebar_layout_after' ); ?>
		
</div>

<?php get_footer(); ?>
