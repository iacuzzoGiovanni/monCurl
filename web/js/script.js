( function ( $ ) {

	$(function(){
		$("#choice .choice").hide();
		$("#choice input").hide();
		$("#envoyer").show();
		$("#choice .choice").first().show();
		$(".imgChoice").parents(".posts").first().attr('checked', 'checked');
		$("#suiv").on("click", avancer);

		$(".supprimer").on("click", derouleSupp);
	});

	
	var avancer = function(e){
		var $next_image = $('#choice .choice:visible').hide().next('.choice');
		
		if($next_image.length < 1){
			$next_image = $('#choice .choice').first();
		}

		$next_image.show();	
		$next_image.children('.imgChoice').attr('checked','checked');
	}

	var derouleSupp = function(e){
		e.preventDefault();
		var info = $(this).parents('.post');
		$(this).parents('.post').slideUp( 'slow', function() {
			id = $(this).attr("id");
			idGood = id.substring(1);
			//window.location.href = "http://localhost:8888/monCurl/curl/supprimer/"+idGood;
			
			$.ajax(
				{
					url:"http://localhost:8888/monCurl/curl/supprimer/",
					type:"post",
					data:{
						id:idGood
					},
					success:function(e){
						info.remove();
					}

				}
			)
		} );
	}

}( jQuery ) );