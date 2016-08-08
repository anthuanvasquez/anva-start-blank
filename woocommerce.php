<?php
/**
 * WARNING: This template file is a core part of the
 * Woocommerce plugin.
 * @link https://wordpress.org/plugins/woocommerce/
 */

get_header();
?>

<div class="container clearfix">
	
	<div class="content-area content-area--full">
		<?php woocommerce_content(); ?>
	</div><!-- .content-area (end) -->
	
	<?php if ( ! is_single() ) : ?>
		<div class="widget-area widget-area--shop">
			<div class="widget-area__wrap">
				<?php if ( dynamic_sidebar( 'shop' ) ) : endif; ?>
			</div>
		</div>
	<?php else : ?>
		<div class="widget-area widget-area--product">
			<div class="widget-area__wrap">
				<?php if ( dynamic_sidebar( 'product' ) ) : endif; ?>
			</div>
		</div>
	<?php endif; ?>
	
</div><!-- .grid-columns (end) -->

<?php get_footer(); ?>
