<?php
/**
 * Template Name: Contact Us
 *
 * The template used for displaying page contact form
 */

get_header();
?>

<div class="container clearfix">
	<div class="content-area">
	
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'page' ); ?>
			<?php echo anva_contact_form(); ?>
		<?php endwhile; ?>

	</div><!-- .content-area (end) -->
	
	<?php anva_sidebars( 'right', '4' ); ?>
</div>

<?php get_footer(); ?>
