(function( $ ) {
	'use strict';
	
	$( window ).load(function() {
		
		var pathname = window.location.pathname,
			cpt_page = $('.post-type-simple_cpt'),
			tax_page = $('.post-type-simple_tax');
		
		if (cpt_page.length && pathname.includes('edit.php')) {
			var template = $('#cpt-header-template').html();
			$('.post-type-simple_cpt #wpbody-content .wrap').prepend(template);
		}
		
		if (tax_page.length && pathname.includes('edit.php')) {
			var template = $('#tax-header-template').html();
			$('.post-type-simple_tax #wpbody-content .wrap').prepend(template);
		}

	});

})( jQuery );
