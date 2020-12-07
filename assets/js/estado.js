console.log("hola")

$('#form').submit(function(e) {
	e.preventDefault();
	var Nombre = $.trim($("#Nombre").val());
	
	
	if (Nombre.length == ""  ) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'Debe completar todos los campos'
		});
	}else if (!isName(Nombre)) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'Ingrese Un Nombre Correcto.'
		});
	}else{
		$.ajax({
			url:"?controller=estado&method=save",
			type:"POST",
			datatype:"json",
			data: {Nombre:Nombre},
			success:function(data){
				Swal.fire({
					type:'success',
					title: 'Registrado Correctamente',					
					icon: 'success',					
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Continuar'
				}).then((result) => {
					if (result.isConfirmed) {					

						window.location.href ="?controller=estado"

					}
				})
			}
		})
	}
})

$('#formU').submit(function(e) {
	e.preventDefault();
	var Id_Estado = $.trim($("#Id_Estado").val());
	var Nombre = $.trim($("#Nombre").val());
	
	
	if (Nombre.length == ""  ) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'Debe completar todos los campos'
		});
	}else if (!isName(Nombre)) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'Ingrese Un Nombre Correcto.'
		});
	}else{
		$.ajax({
			url:"?controller=estado&method=update",
			type:"POST",
			datatype:"json",
			data: {Id_Estado:Id_Estado,Nombre:Nombre},
			success:function(data){
				Swal.fire({
					type:'success',
					title: 'Actualizado Correctamente',					
					icon: 'success',					
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Continuar'
				}).then((result) => {
					if (result.isConfirmed) {					

						window.location.href ="?controller=estado"

					}
				})
			}
		})
	}
})

function isName (Nombre){
    return /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/.test(Nombre);
}