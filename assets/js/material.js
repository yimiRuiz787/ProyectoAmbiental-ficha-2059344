console.log("hola")

$('#form').submit(function(e) {
	e.preventDefault();
	var Nombre_Material = $.trim($("#Nombre_Material").val());
	var Descripcion = $.trim($("#Descripcion").val());
	
	
	if (Nombre_Material.length == "" || Descripcion.length == ""  ) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'Debe completar todos los campos'
		});
	}else if (!isName(Nombre_Material)) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'Ingrese Un Nombre Correcto.'
		});
	}else{
		$.ajax({
			url:"?controller=material&method=save",
			type:"POST",
			datatype:"json",
			data: {Nombre_Material:Nombre_Material,Descripcion:Descripcion},
			success:function(data){
				Swal.fire({
					type:'success',
					title: 'Registrado Correctamente',					
					icon: 'success',					
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Continuar'
				}).then((result) => {
					if (result.isConfirmed) {					

						window.location.href ="?controller=material"

					}
				})
			}
		})
	}
})

$('#formU').submit(function(e) {
	e.preventDefault();
	var Id_Material = $.trim($("#Id_Material").val());
	var Nombre_Material = $.trim($("#Nombre_Material").val());
	var Descripcion = $.trim($("#Descripcion").val());
	
	
	if (Nombre_Material.length == "" || Descripcion.length == ""  ) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'Debe completar todos los campos'
		});
	}else if (!isName(Nombre_Material)) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'Ingrese Un Nombre Correcto.'
		});
	}else{
		$.ajax({
			url:"?controller=material&method=update",
			type:"POST",
			datatype:"json",
			data: {Id_Material:Id_Material,Nombre_Material:Nombre_Material,Descripcion:Descripcion},
			success:function(data){
				Swal.fire({
					type:'success',
					title: 'Actualizado Correctamente',					
					icon: 'success',					
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Continuar'
				}).then((result) => {
					if (result.isConfirmed) {					

						window.location.href ="?controller=material"

					}
				})
			}
		})
	}
})

function isName (Nombre_Material){
    return /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/.test(Nombre_Material);
}