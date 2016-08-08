<?php

/*
 * Setup slideshows 
 */
function anva_slideshows_setup() {
	add_action( 'add_meta_boxes', 'anva_slideshows_add_meta' );
	add_action( 'save_post', 'anva_slideshows_save_meta', 1, 2 );
	add_shortcode( 'slideshows', 'anva_slideshows_shortcode' );
}

function anva_get_slideshows() {
	
	$args = array();
	$slider_speed = anva_get_option( 'slider_speed' );
	$slider_control = anva_get_option( 'slider_control' );
	$slider_direction = anva_get_option( 'slider_direction' );
	$slider_play = anva_get_option( 'slider_play' );
	$slide_animation = 'slide';
	$slide_animation_speed = '1000';

	// Main Slider
	$args['homepage'] = array(
		'name' => 'Homepage',
		'size' => 'slider_large',
		'type' => 'flexslider',
		'options' => "
			animation: '$slide_animation',
			animationSpeed: '$slide_animation_speed',
			slideshowSpeed: '$slider_speed',
			controlNav: ( $slider_control == 1 ? true : false ),
			directionNav: ( $slider_direction == 1 ? true : false ) ,
			prevText: '<i class=\"fa fa-angle-left\"></i>',
			nextText: '<i class=\"fa fa-angle-right\"></i>',
			useCSS: true,
			touch: true,
			video: true,
			start: function(slider) {
				slider.removeClass('loading');
			}
		"
	);

	// Attachments Slider	
	$args['attachments'] = array(
		'name' => 'Attachments',
		'size' => 'blog_large',
		'type' => 'flexslider',
		'options' => "
			controlNav: false,
			directionNav: true,
			pausePlay: false,
			smoothHeight: true,
			start: function(slider) {
				slider.removeClass('loading');
			}
		"
	);
	
	return apply_filters( 'anva_slideshows', $args );
}

/*
 * Output slides from slideshows array
 */
function anva_slideshows_featured( $slug ) {
	
	// Get slides area
	$slideshows = anva_get_slideshows();
	
	// Set args
	$image_size = isset( $slideshows[$slug]['size'] ) ? $slideshows[$slug]['size'] : 'large';
	$orderby    = isset( $slideshows[$slug]['orderby'] ) ? $slideshows[$slug]['orderby'] : "menu_order";
	$order      = isset( $slideshows[$slug]['order'] ) ? $slideshows[$slug]['order'] : "ASC";
	$limit      = isset( $slideshows[$slug]['limit'] ) ? $slideshows[$slug]['limit'] : "-1";

	// Default Query Args
	$query_args = array(
		'post_type'      => array( 'slideshows' ),
		'order'          => $order,
		'orderby'        => $orderby,
		'meta_key'       => '_slider_id',
		'meta_value'     => $slug,
		'posts_per_page' => $limit
	);
	
	// Attachments Query Args
	if ( $slug == "attachments" ) {
		$query_args['post_type'] = 'attachment';
		$query_args['post_parent'] = get_the_ID();
		$query_args['post_status'] = 'inherit';
		$query_args['post_mime_type'] = 'image';
		unset( $query_args['meta_value'] );
		unset( $query_args['meta_key'] );
	}
	
	// Output
	$html = "";
	
	$the_query = anva_get_post( apply_filters( 'anva_slideshows_query_args', $query_args ) );

	if ( $the_query->have_posts() ) {
		$html .= '<div id="slider-wrap-' . $slug . '" class="slider__wrap slider__wrap--' . $slug . '">';
		$html .= '<ul class="slides">';
		
		while ( $the_query->have_posts() ) {

			$the_query->the_post();
			
			$meta = anva_get_post_custom();

			$url 	= ( isset( $meta['_slider_link_url'][0] ) ? $meta['_slider_link_url'][0] : '' );
			$data = ( isset( $meta['_slider_data'][0] ) ? $meta['_slider_data'][0] : '' );

			$a_tag_opening = '<a class="slides__link" href="' . $url . '">';
						
			$html .= '<li class="slides__item">';
			$html .= '<div id="slide-' . get_the_ID() . '" class="slides__wrap slide__wrap--'. get_the_ID() . '">';
			
			if ( $slug == "attachments" ) {
				$html .= wp_get_attachment_image( get_the_ID(), $image_size );
			
			} elseif ( has_post_thumbnail() ) {
				
				if ( $url ) {
					$html .= $a_tag_opening;
				}

				$html .= get_the_post_thumbnail( get_the_ID(), $image_size , array( 'class' => 'slides__image slide-thumbnail' ) );

				if ( $url ) {
					$html .= '</a>';
				}
			}
			
			switch ( $data ) {

				case 'title':
					$html .= '<div class="slides__caption slide__caption--no-desc">';
					$html .= '<h2 class="slides__title">';
					$html .= get_the_title();
					$html .= '</h2>';
					$html .= '</div>';
					break;

				case 'desc':
					$html .= '<div class="slides__caption slide__caption--no-title">';
					$html .= '<div class="slides__description">';
					$html .= get_the_excerpt();
					$html .= '</div>';
					$html .= '</div>';
					break;

				case 'show':
					$html .= '<div class="slides__caption">';
					$html .= '<h2 class="slides__title">';
					$html .= get_the_title();
					$html .= '</h2>';
					$html .= '<div class="slides__description">';
					$html .= get_the_excerpt();
					$html .= '</div>';
					$html .= '</div>';
					break;

			}
	
			$html .= '</div><!-- #slide-' . get_the_ID() . ' (end) -->';
			$html .= '</li>';
		}

		$html .= '</ul>';
		$html .= '</div>';	
	}
	
	// Reset wp query
	wp_reset_query();

	// Init Flexslider
	if ( 'flexslider' == $slideshows[$slug]['type'] ) {

		wp_enqueue_script( 'flexslider-js', get_template_directory_uri() . '/assets/js/vendor/jquery.flexslider.min.js', array( 'jquery' ), '', true );

		$html .= '<script>';
		$html .= 'jQuery(document).ready(function($) {';
		$html .= "$('#slider-wrap-{$slug}').addClass('loading');";
		$html .= "$('#slider-wrap-{$slug}').flexslider({";
			
		if ( isset( $slideshows[$slug]['options'] ) && $slideshows[$slug]['options'] != "" ) { 
			$html .= $slideshows[$slug]['options'];
		} else {
			$html .="prevText: '<i class=\"fa fa-angle-left\"></i>', nextText: '<i class=\"fa fa-angle-right\"></i>',";
			$html .="start: function(slider){ slider.removeClass('loading'); }";
		}
		
		$html .= "});";
		$html .= "});";
		$html .= '</script>';

	// Init Slick JS
	} elseif( 'slick' == $slideshows[$slug]['type'] ) {

		wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/assets/js/vendor/slick.min.js', array( 'jquery' ), '', true );

		$html .= '<script>';
		$html .= 'jQuery(document).ready(function($) {';
		$html .= "$('#slider-wrap-{$slug} .slides').slick({";
		$html .= "autoplay: true, autoplaySpeed: 7000, dots: true";
		$html .= "});";
		$html .= "});";
		$html .= '</script>';

	}

	return $html;
}

/*
 * Admin metabox
 */
function anva_slideshows_add_meta() {
	add_meta_box(
		'anva_slideshows_metabox',
		anva_get_local( 'slide_meta' ),
		'anva_slideshows_metabox',
		'slideshows',
		'normal',
		'default'
	);
}

/*
 * Metabox form
 */
function anva_slideshows_metabox() {
	
	global $post;	
		
	$slideshows 			= anva_get_slideshows();
	$meta 						= anva_get_post_custom();
	$slider_id		 		= ( isset( $meta['_slider_id'][0] ) ? $meta['_slider_id'][0] : '' );
	$slider_link_url 	= ( isset( $meta['_slider_link_url'][0] ) ? $meta['_slider_link_url'][0] : '' );
	$slider_data			=	( isset( $meta['_slider_data'][0] ) ? $meta['_slider_data'][0] : '' );
	?>

	<table class="form-table">
		<tr>
			<th>
				<label for="slider_link_url">URL:</label>
			</th>
			<td>
				<input type="text" style="width:99%;" name="slider_link_url" value="<?php echo esc_attr( $slider_link_url ); ?>" />
			</td>
		</tr>
		<tr>
			<th>
				<label for="slider_id"><?php echo anva_get_local( 'slide_area' ); ?>:</label>
			</th>
			<td>
				<?php if ( $slideshows ) : ?>
					<select name="slider_id" style="width:99%;text-transform:capitalize;">
						<?php foreach ( $slideshows as $slide => $item ) : ?>
							<option value="<?php echo esc_attr( $slide ); ?>" <?php selected( $slider_id, $slide, true ); ?>><?php echo $item['name']; ?></option>
						<?php endforeach; ?>
					</select>
				<?php else : ?>
					<div style="color:red;">
						<?php anva_get_local( 'slide_message' ); ?>
					</div>
				<?php endif; ?>
			</td>
		</tr>
		<tr>
			<th>
				<label for="slider_data"><?php echo anva_get_local( 'slide_content' ); ?>:</label>
			</th>
			<td>
				<select name="slider_data" style="width:99%;">
					<?php
						$select = array(
							'title' => anva_get_local('slide_title'),
							'desc' 	=> anva_get_local('slide_desc'),
							'show' 	=> anva_get_local('slide_show'),
							'hide' 	=> anva_get_local('slide_hide'),
						);
						foreach ( $select as $key => $value ) {
							echo '<option value="'.esc_attr( $key ).'" '. selected( $slider_data, $key, true ) .'>'. $value .'</option>';
						}
					?>
				</select>
			</td>
		</tr>
	</table>
	<?php
}

/*
 * Save metabox
 */
function anva_slideshows_save_meta( $post_id, $post ) {
	
	if ( isset( $_POST['slider_link_url'] ) ) {
		update_post_meta( $post_id, '_slider_link_url', strip_tags( $_POST['slider_link_url'] ) );
	}
	
	if ( isset( $_POST['slider_id'] ) ) {
		update_post_meta( $post_id, '_slider_id', strip_tags( $_POST['slider_id'] ) );
	}

	if ( isset( $_POST['slider_data'] ) ) {
		update_post_meta( $post_id, '_slider_data', strip_tags( $_POST['slider_data'] ) );
	}

}

/*
 * Create slideshows shortcode
 */
function anva_slideshows_shortcode( $atts, $content = null ) {

	extract(shortcode_atts( array(
		'slug' => 'attachments',
	), $atts ));
	
	$string = anva_get_local( 'slide_shortcode' );
	
	if ( empty( $slug ) ) {
		return apply_filters( 'anva_slideshows_empty_shortcode', $string );
	}

	return anva_slideshows_featured( $slug );
}
