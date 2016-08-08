<?php
/**
 * The template for displaying the footer.
 */

			do_action( 'anva_content_after' );
			?>		
		</div>
	</section><!-- MAIN (end) -->
	
	<footer id="footer" class="footer footer--dark">	
		<div class="container">
			<?php do_action( 'anva_footer_content' ); ?>
		</div>

		<div id="copyrights" class="copyrights">
			<div class="container clearfix">
				<?php do_action( 'anva_footer_text' ); ?>
			</div>
		</div>
	</footer><!-- #footer (end) -->

</div><!-- WRAPPER (end) -->

<div id="gotop" class="gototop">
	<i class="fa fa-chevron-up"></i>
	<span class="sr-only">
		<?php _e( 'Go Top', 'anva-start' ); ?>
	</span>
</div>

<?php do_action( 'anva_layout_after' ); ?>
<?php wp_footer(); ?>
</body>
</html>
