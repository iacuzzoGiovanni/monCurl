( function ( $ ) {

	$(function(){
		$("#choice .lesImages").hide();
		$("#choice input").hide();
		$("#envoyer").show();
		$("#choice .lesImages").first().show();
		$("#suiv").on("click", avancer);
	});

	
	var avancer = function(e){
		var $next_image = $('#choice .lesImages:visible').hide().next('.lesImages');
		
		if($next_image.length < 1){
			$next_image = $('#choice .lesImages').first();
		}

		$next_image.show();
	}

}( jQuery ) );