<?php
/**
 * The template used for displaying page content in page.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_content(); ?>
</article>
