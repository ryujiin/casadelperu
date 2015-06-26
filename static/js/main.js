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
	});
	$('.add_to_cart_catalogo').click(function () {
		var producto = this.dataset.producto;
		var total = this.dataset.total;
		$.post( "/validar/add_cart.php", { id_producto: producto, total: total } ).done(function (data) {
			if (data=='error - no login') {
				$('#login_user').modal('show');
			}else{
				window.location="/?page=carro";
			}
		})
	});

	/*pagar*/
	$('#departamento').change(function () {
		var id_depa = this.value;
		$.post('/ajax/sel_depa.php',{depa:id_depa}).done(function (data) {
			$('#provincia').empty().append(data);
		})
		
	});
	$('#provincia').change(function () {
		var id_depa = this.value;
		$.post('/ajax/sel_provincia.php',{depa:id_depa}).done(function (data) {			
			$('#distrito').empty().append(data);
		})
		
	})
});