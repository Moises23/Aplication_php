$(function(){
	$('#search').focus();
	$("#search_form").submit(function(e){
		e.preventDefault();
	})

	$('#search').keyup(function(){
		var envio=$('#search').val();
		$('#resultado').html('<h2> <img src="Imagenes/Cargando.gif" width="20" alt="" />Cargando </h2>');
		$.ajax({

			type:'POST',
			url:'Buscador.php',
			data:('search='+envio),
			success:function(resp){
				if (resp!="") {
					$('#resultado').html(resp);
				};
			}
		})
	})
})