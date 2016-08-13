<?php
/**
 * The template for displaying the header.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
		<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'anva_layout_before' ); ?>

<div id="off-canvas" class="off-canvas">	
	<div  class="off-canvas__wrap">
		<span class="off-canvas__title">
			<?php _e( 'Menu', 'anva-start' ); ?>	
		</span>
		<?php
			if ( has_nav_menu( 'primary' ) ) {
				bem_menu( 'primary', 'off-canvas-menu' );
			}
		?>
	</div>
</div><!-- #off-canvas (end) -->

<div id="wrapper" class="wrapper">

	<a href="#" id="off-canvas-trigger" class="off-canvas-trigger">
		<i class="fa fa-bars"></i>
	</a>

	<header id="header" class="header">
		<div class="container clearfix">
			<div id="logo" class="logo">
				<?php do_action( 'anva_header_logo' ); ?>
			</div>
			<div class="header-addon">
				<?php do_action( 'anva_header_addon' ); ?>
			</div>
		</div>
		<div class="header__wrap">
			<?php do_action( 'anva_main_navigation' ); ?>
		</div>
	</header><!-- #header (end) -->	
	
	<?php do_action( 'anva_slider' ); ?>

	<?php if ( ! is_front_page() ) : ?>
		<section class="page-title">
			<div class="container clearfix">
				<h1 class="page-title__heading">
					<?php anva_the_page_title(); ?>
				</h1>
			</div>
		</section>
	<?php endif; ?>

	<!-- CONTENT (start) -->
	<section id="content" class="content">
		<div class="content__wrap">		
			<?php do_action( 'anva_content_before' ); ?>
