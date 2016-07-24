<?php

/**
 * Get sidebars columns and location
 */
function anva_sidebars( $position ) {
	?>
	<div class="widget-area widget-area--<?php echo esc_attr( $position ); ?>">
		<?php get_sidebar( $position ); ?>
	</div><!-- .sidebar-wrapper (end) -->
	<?php
}
