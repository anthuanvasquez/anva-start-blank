<?php
/**
 * Template Name: Woocommerce Products
 *
 * The template used for displaying products in front page
 * Woocommerce plugin is required.
 * @link https://wordpress.org/plugins/woocommerce/
 */

get_header();
?>

<div class="container clearfix">
	<div class="coontent-area content-area--full">

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
				<header class="entry-header" style="display:none;">
					<h1 class="entry-title"><?php the_title(); ?></h1>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- .entry-content -->

			</article><!-- #post-## -->

		<?php endwhile; ?>

	</div><!-- .content-area (end) -->

	<div class="latest-products">
		<div class="latest-products__special">
			<h2 class="latest-products__heading">
				<?php echo anva_get_local( 'product_featured' ) ?>
			</h2>
			<?php echo do_shortcode( '[featured_products per_page="4" columns="4" orderby="rand"]' ); ?>
		</div>

		<div class="latest-products__new">
			<h2 class="latest-products__heading">
				<?php echo anva_get_local( 'product_latest' ); ?>
			</h2>
			<?php echo do_shortcode( '[recent_products per_page="4" columns="4" orderby="rand"]' ); ?>
		</div>
	</div><!-- latest-products (end) -->

</div><!-- .grid-columns (end) -->

<?php get_footer(); ?>
