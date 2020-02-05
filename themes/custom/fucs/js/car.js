$(document).ready(function(){
	$('.tienda-catalogo-car').click(function(){
		var datos = $(this).find("p").text().split(',');
		var url = "/car.php?nombre="+datos[1]+"&precio="+datos[2]+"&articulo="+datos[3];
		console.log("url: "+url);
		var response = '';
		request = $.ajax({
			url: url,
			type: "get",
		});
          
		request.done(function (response, textStatus, jqXHR){

			$('.show-add-car').show();
			$('.show-add-car').delay(3000).hide(600);

			// console.log("textStatus: "+response);
		});
	});
});

$(document).ready(function(){
	$('.comprarInterna').click(function(){
		var nombre = $(this).find(".field--name-field-titulo-publicaciones").text();
		var precio = $(this).find(".field--name-field-precio").text();
		var articulo = $(this).find(".field--name-field-referencia .field__item a").text();
		var url = "/car.php?nombre="+nombre+"&precio="+precio+"&articulo="+articulo;
		console.log("url: "+url);
		var response = '';
		request = $.ajax({
			url: url,
			type: "get",
		});
          
		request.done(function (response, textStatus, jqXHR){

			$('.show-add-car').show();
			$('.show-add-car').delay(3000).hide(600);

			// console.log("textStatus: "+response);
		});
	});
});
