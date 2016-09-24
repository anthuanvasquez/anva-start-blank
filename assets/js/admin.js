jQuery(document).ready(function($) {
	
	var pageTemplate = $('page_template');

	function validate( val ) {
		
		var pageGrid = $('#post_grid'),
			pageSidebar = $('#sidebar_column');
		
		if ( 'template_post-grid.php' === val ) {
			pageGrid.show();
		} else {
			pageGrid.hide();
		}
		
		if ( 'default' === val ) {
			pageSidebar.show();
		} else {
			pageSidebar.hide();
		}
	}
	
	// Initial
	validate( pageTemplate.val() );

	// On Change
	pageTemplate.on( 'change', function() {
		validate( $(this).val() );
	});

});
