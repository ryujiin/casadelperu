$( document ).ready(function() {
	
	$('#producto_single .estrellas span').click(function () {
		var valor = this.dataset.valor;
		var producto = $('#id_producto').val();
		$.post('/ajax/valorar_producto.php',{producto:producto,valor:valor})
		.done(function (data) {
			$('#producto_single .estrellas span').each(function (e,i) {
				if (e<valor) {
					$(i).addClass('pintado');
				}else{
					$(i).removeClass('pintado');
				}
			})
			console.log(data);
		});
	})

	$('#sortby').change(function() {
		$('#form_sortby').submit();

		/*
		var busqueda = window.location.search;
		var seleccion = this.value;
		if (busqueda=='') {
			window.location="?sortby="+seleccion;
		}else{
			debugger;
			var url = window.location.href+'&sortby='+seleccion;
			window.location=url;
		}*/
	});


});