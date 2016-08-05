<?php
/**
 * The template file for 404's
 */

get_header();
?>

<div class="container clearfix">
	<div class="content-area">
		<?php get_template_part( 'content', 'error' ); ?>
	</div><!-- .content-area (end) -->
</div><!-- .container (end) -->

<?php get_footer(); ?>
