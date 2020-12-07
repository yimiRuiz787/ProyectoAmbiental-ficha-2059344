console.log("hola")

$('#form').submit(function(e) {
	e.preventDefault();
	var Nombre_Tipo_Material = $.trim($("#Nombre_Tipo_Material").val());
	var Id_Material = $.trim($("#Id_Material").val());
	var Puntos = $.trim($("#Puntos").val());
	var Cantidad = $.trim($("#Cantidad").val());
	
	if (Nombre_Tipo_Material.length == "" || Id_Material.length == "" || Puntos.length == "" || Cantidad.length == "" ) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'Debe completar todos los campos'
		});
	}else if (!isName(Nombre_Tipo_Material)) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'Debe ingresar un Nombre Correcto.'
		});
	}else if (Puntos <= 0) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'Debe ingresar NUMEROS POSITIVOS.'
		});
	}else if (Cantidad <= 0) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'Debe ingresar NUMEROS POSITIVOS.'
		});
	}else{
		$.ajax({
			url:"?controller=tipoMaterial&method=save",
			type:"POST",
			datatype:"json",
			data: {Nombre_Tipo_Material:Nombre_Tipo_Material,Id_Material:Id_Material,Puntos:Puntos,Cantidad:Cantidad},
			success:function(data){
				Swal.fire({
					type:'success',
					title: 'Registrado Correctamente',					
					icon: 'success',					
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Continuar'
				}).then((result) => {
					if (result.isConfirmed) {					

						window.location.href ="?controller=tipoMaterial"

					}
				})
			}
		})
	}
})

$('#formU').submit(function(e) {
	e.preventDefault();
	var Id_Tipo = $.trim($("#Id_Tipo").val());
	var Nombre_Tipo_Material = $.trim($("#Nombre_Tipo_Material").val());
	var Id_Material = $.trim($("#Id_Material").val());
	var Puntos = $.trim($("#Puntos").val());
	var Cantidad = $.trim($("#Cantidad").val());
	
	if (Nombre_Tipo_Material.length == "" || Id_Material.length == "" || Puntos.length == "" || Cantidad.length == "" ) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'Debe completar todos los campos'
		});
	}else if (!isName(Nombre_Tipo_Material)) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'Debe ingresar un Nombre Correcto.'
		});
	}else if (Puntos <= 0) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'Debe ingresar NUMEROS POSITIVOS.'
		});
	}else if (Cantidad <= 0) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'Debe ingresar NUMEROS POSITIVOS.'
		});
	}else{
		$.ajax({
			url:"?controller=tipomaterial&method=update",
			type:"POST",
			datatype:"json",
			data: {Id_Tipo:Id_Tipo,Nombre_Tipo_Material:Nombre_Tipo_Material,Id_Material:Id_Material,Puntos:Puntos,Cantidad:Cantidad},
			success:function(data){
				Swal.fire({
					type:'success',
					title: 'Actualizado Correctamente',					
					icon: 'success',					
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Continuar'
				}).then((result) => {
					if (result.isConfirmed) {					

						window.location.href ="?controller=tipoMaterial"

					}
				})
			}
		})
	}
})

function isName (Nombre_Tipo_Material){
    return /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/.test(Nombre_Tipo_Material);
}