$(document).ready(function() {
	$('#filter').keyup(function(event) {
	
      filter('.tr ', $(this).val());
    
	});
		
});
