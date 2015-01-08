jQuery(document).ready(function($) {

	$(".livemesh-tabs").tabs();
	
	$(".livemesh-toggle").each( function () {
		if($(this).attr('data-id') == 'closed') {
			$(this).accordion({ header: '.livemesh-toggle-title', collapsible: true, active: false  });
		} else {
			$(this).accordion({ header: '.livemesh-toggle-title', collapsible: true});
		}
	});
	
	
});