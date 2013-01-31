( function ( $ ) {
	
	var avancer = function(e){
		var $next_image = $('#choice .choice:visible').hide().next('.choice');
		
		if($next_image.length < 1){
			$next_image = $('#choice .choice').first();
		}

		$next_image.show();

		$next_image.children('.imgChoice').attr('checked','checked');
	};

	var reculer = function(e){
		var $prev_image = $('#choice .choice:visible').hide().prev('.choice');
		
		if($prev_image.length < 1){
			$prev_image = $('#choice .choice').last();
		}

		$prev_image.show();

		$prev_image.children('.imgChoice').attr('checked','checked');
	};

	var derouleSupp = function(e){
		e.preventDefault();
		
		var info = $(this).parents('.postContainer');
		
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
	};

	var modifier = function(e){
		e.preventDefault();
		var post = $(this).parents(".post");
		var html = $(this).parents(".infos").html();
		$(this).parents(".infos").remove();
		post.append('<form class="infos" accept-charset="utf-8" method="post" action="http://localhost:8888/monCurl/curl/maj"><form>');
		post.children('.infos').append(html);
		post.children('.infos').find("h2").replaceWith('<input class="titreLien" type="text" name="titre" value="' + $(this).parents(".infos").find("h2").text() + '" />');
		post.children('.infos').find("p").replaceWith('<textarea name="description">' + $(this).parents(".infos").find("p").text() + '</textarea>');
		post.children('.infos').append('<button class="saveChange" type="submit">enregistrer</button>');
	};

	var enregistrerChange = function(e){
		e.preventDefault();
		var infos = $(this).parent();
		var post = $(this).parents(".post");
		var html = $(this).parents(".infos").html();
		
		$.ajax(
			{
				url:"http://localhost:8888/monCurl/curl/maj",
				type:"post",
				data:{
					id:infos.parents('div').attr('id').substring(1),
					titre:infos.children('input').val(),
					description:infos.children('textarea').val(),
					img:infos.parents('.post').find('.img').children('img').attr('src'),
					url:infos.children('span').text()
				}
			}
		)

		$(this).parents(".infos").remove();
		post.append('<section class="infos"></section>');
		post.children('.infos').append(html);
		post.children('.infos').find(".titreLien").replaceWith('<h2>' + infos.children('input').val() + '</h2>');
		post.children('.infos').find("textarea").replaceWith('<p>' + infos.children('textarea').val() + '</p>')
		post.children('.infos').find("button").remove();
	};

	var signIn = function(e){
		e.preventDefault();
		
		var infos = $(this);
		var bool = true;

		if(infos.parents('form').find("#emailI").val() === "" || !checkEmail( infos.parents('form').find("#emailI").val() ) ){
			$(".emailI").remove();
			infos.parents('form').find("#emailI").after('<span class="emailI errors">Ce champ ne peut pas être vide et doit contenir un e-mail</span>');
			bool = false;
		}else{
			$(".emailI").remove();
		}

		if(infos.parents('form').find("#mdpI").val() === ""){
			$(".mdpI").remove();
			infos.parents('form').find("#mdpI").after('<span class="mdpI errors">Ce champ ne peut pas être vide et doit contenir un mot de passe</span>');
			bool = false;
		}else{
			$(".mdpI").remove();
		}

		if(infos.parents('form').find("#mdpI2").val() === "" || infos.parents('form').find("#mdpI2").val() != infos.parents('form').find("#mdpI").val() ){
			$(".mdpI2").remove();
			infos.parents('form').find("#mdpI2").after('<span class="mdpI2 errors">Ce champ ne peut pas être vide et doit être le même que celui indiqué précédement</span>');
			bool = false;
		}else{
			$(".mdpI2").remove();
		}

		if(bool){
			$("#loadingSignIn").css("display", "block");
			$.ajax(
				{
					url:$(this).parents('form').attr('action'),
					type:"post",
					data:{
						email1:infos.parents('form').find("#emailI").val(),
						mdp1:infos.parents('form').find("#mdpI").val(),
						mdp2:infos.parents('form').find("#mdpI2").val()
					},
					complete:function(e){
						$("#loadingSignIn").children('p').text('Inscription réussie');
						$("#loadingSignIn").children('img').attr('src', 'http://localhost:8888/monCurl/web/img/check.png');
						$("#loadingSignIn").append('<a href="' + 'http://localhost:8888/monCurl/curl/index' + '">commencer a ajouter des liens</a>')
					}
				}
			)
		}
	};

	var checkEmail = function(mail){
		var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');

		if(reg.test(mail))
		{
			return(true);
		}
		else
		{
			return(false);
		}
	};

	var checkUrl = function(e){
		e.preventDefault();
		$("#form img").css('display', 'inline');
		var $this = $(this);
		$.ajax(
			{
				url:$this.parents('form').attr('action'),
				type:"post",
				data:{
					text:$this.parents('form').find("textarea").val()
				},
				success:function(e){
					if(e){
						$this.parents("form").submit();
					}else{
						$this.parents("fieldset").find(".urlKo").remove();
						$this.parents("fieldset").append('<span class="urlKo">L\'url que vous avez entrée n\'est pas valide</span>');
					}
					$("#form img").css('display', 'none');
				}
			}
		)
	};

	$(function(){
		$("#choice .choice").hide();
		$("#choice input").hide();
		$("#envoyer").show();
		$("#choice .choice").first().show();
		$(".imgChoice").parents(".posts").first().attr('checked', 'checked');
		$("#suiv").on("click", avancer);
		$("#prec").on("click", reculer);
		$(".post").delegate(".supprimer", "click", derouleSupp);
		$(".post").delegate(".modifier", "click", modifier);
		$(".post").delegate(".saveChange", "click", enregistrerChange);
		$("#connexion").delegate("#register", "click", signIn);
		$("#partager").on("click", checkUrl);
	});

}( jQuery ) );