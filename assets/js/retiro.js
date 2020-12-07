console.log("hola")

$('#form').submit(function(e) {
	e.preventDefault();
	var Fecha = $.trim($("#Fecha").val());
	var Cantidad_Puntos_de_Retiro = $.trim($("#Cantidad_Puntos_de_Retiro").val());
	var Id_Usuario = $.trim($("#Id_Usuario").val());
	var name = $("#Id_Usuario option:selected").text();
	
	if (Fecha.length == "" || Cantidad_Puntos_de_Retiro.length == "" || Id_Usuario.length == ""  ) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'Debe completar todos los campos'
		});
	}else if (Cantidad_Puntos_de_Retiro <= 0) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'La Cantidad Debe Ser Positiva.'
		});
	}else{
		$.ajax({
			url:"?controller=retiro&method=save",
			type:"POST",
			datatype:"json",
			data: {Fecha:Fecha,Cantidad_Puntos_de_Retiro:Cantidad_Puntos_de_Retiro,Id_Usuario:Id_Usuario},
			success:function(data){
				Swal.fire({
					type:'success',
					title: 'Retiro Registrado corectamente',
					text:'Se han retirado '+Cantidad_Puntos_de_Retiro+' Puntos al Cliente '+name,					
					icon: 'success',					
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Continuar'
				}).then((result) => {
					if (result.isConfirmed) {					

						window.location.href ="?controller=retiro"

					}
				})
			}
		})
	}
})

$('#formU').submit(function(e) {
	e.preventDefault();

	var Id_Retiro = $.trim($("#Id_Retiro").val());
	var Fecha = $.trim($("#Fecha").val());
	var Cantidad_Puntos_de_Retiro = $.trim($("#Cantidad_Puntos_de_Retiro").val());
	var Id_Usuario = $.trim($("#Id_Usuario").val());
	var name = $("#Id_Usuario option:selected").text();
	
	if (Fecha.length == "" || Cantidad_Puntos_de_Retiro.length == "" || Id_Usuario.length == ""  ) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'Debe completar todos los campos'
		});
	}else if (Cantidad_Puntos_de_Retiro <= 0) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'La Cantidad Debe Ser Positiva.'
		});
	}else{
		$.ajax({
			url:"?controller=retiro&method=update",
			type:"POST",
			datatype:"json",
			data: {Id_Retiro:Id_Retiro,Fecha:Fecha,Cantidad_Puntos_de_Retiro:Cantidad_Puntos_de_Retiro,Id_Usuario:Id_Usuario},
			success:function(data){
				Swal.fire({
					type:'success',
					title: 'Retiro Actualizado corectamente',
					text:'Se han retirado '+Cantidad_Puntos_de_Retiro+' Puntos al Cliente '+name,					
					icon: 'success',					
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Continuar'
				}).then((result) => {
					if (result.isConfirmed) {					

						window.location.href ="?controller=retiro"

					}
				})
			}
		})
	}
})