console.log("hola")

$('#form').submit(function(e) {
	e.preventDefault();
	var Nit_Empresa = $.trim($("#Nit_Empresa").val());
	var Nombre_Empresa = $.trim($("#Nombre_Empresa").val());
	var Telefono = $.trim($("#Telefono").val());
	var Direccion = $.trim($("#Direccion").val());
	
	if (Nit_Empresa.length == "" || Nombre_Empresa.length == "" || Telefono.length == "" || Direccion.length == "" ) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'Debe completar todos los campos'
		});
	}else if (Nit_Empresa <= 0) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'El Nit Debe Ser Positivo'
		});
	}else if (!isName(Nombre_Empresa)) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'Debe ingresar un Nombre Correcto.'
		});
	} else if (Nombre_Empresa.length > 30) {
		Swal.fire({
			type: 'warning',
			icon: 'warning',
			title: 'Nombre demasiado largo.'
		});
	} else if (Telefono <= 0) {
		Swal.fire({
			type: 'warning',
			icon: 'warning',
			title: 'Debe ingresar NUMEROS POSITIVOS.'
		});
	} else if (Telefono.length < 6 || Telefono.length > 10) {
		Swal.fire({
			type: 'warning',
			icon: 'warning',
			title: 'Télefono debe tener entre 6 y 10 digitos '
		});
	} else if (Direccion.length < 8 || Direccion.length > 30) {
		Swal.fire({
			type: 'warning',
			icon: 'warning',
			title: 'Dirección tiene muchos o muy pocos caracteres '
		});
	}else{

		$.ajax({
			url:"?controller=empresaReciclaje&method=save",
			type:"POST",
			datatype:"json",
			data: {Nit_Empresa:Nit_Empresa,Nombre_Empresa:Nombre_Empresa,Telefono:Telefono,Direccion:Direccion},
			success:function(respuesta){
				if (respuesta == 2) {
					Swal.fire({
						type:'warning',
						icon: 'warning',
						title:'Nit Duplicado'
					});
				}else if (respuesta == 1) {
					Swal.fire({
						type:'success',
						title: 'Registrado Correctamente',					
						icon: 'success',					
						confirmButtonColor: '#3085d6',
						confirmButtonText: 'Continuar'
					}).then((result) => {
						if (result.isConfirmed) {					

							window.location.href ="?controller=empresaReciclaje"

						}
					})
				}
				
			}

		})
	}	
})

$('#formU').submit(function(e) {
	e.preventDefault();
	var Id_Empresa_Reciclaje = $.trim($("#Id_Empresa_Reciclaje").val());
	var Nit_Empresa = $.trim($("#Nit_Empresa").val());
	var Nombre_Empresa = $.trim($("#Nombre_Empresa").val());
	var Telefono = $.trim($("#Telefono").val());
	var Direccion = $.trim($("#Direccion").val());
	
	if (Nit_Empresa.length == "" || Nombre_Empresa.length == "" || Telefono.length == "" || Direccion.length == "" ) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'Debe completar todos los campos'
		});
	}else if (Nit_Empresa <= 0) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'El Nit Debe Ser Positivo'
		});
	}else if (!isName(Nombre_Empresa)) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'Debe ingresar un Nombre Correcto.'
		});
	}else if (Nombre_Empresa.length > 30) {
		Swal.fire({
			type: 'warning',
			icon: 'warning',
			title: 'Nombre demasiado largo.'
		});
	}else if (Telefono <=0) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'Debe ingresar NUMEROS POSITIVOS.'
		});
	} else if (Telefono.length < 6 || Telefono.length > 10) {
		Swal.fire({
			type: 'warning',
			icon: 'warning',
			title: 'Télefono debe tener entre 6 y 10 digitos '
		});
	} else if (Direccion.length < 8 || Direccion.length > 30) {
		Swal.fire({
			type: 'warning',
			icon: 'warning',
			title: 'Dirección tiene muchos o muy pocos caracteres '
		});
	}else{
		$.ajax({
			url:"?controller=empresaReciclaje&method=update",
			type:"POST",
			datatype:"json",
			data: {Id_Empresa_Reciclaje:Id_Empresa_Reciclaje, Nit_Empresa:Nit_Empresa,Nombre_Empresa:Nombre_Empresa,Telefono:Telefono,Direccion:Direccion},
			success:function(data){
				Swal.fire({
					type:'success',
					title: 'Actualizado Correctamente',					
					icon: 'success',					
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Continuar'
				}).then((result) => {
					if (result.isConfirmed) {					

						window.location.href ="?controller=empresaReciclaje"

					}
				})
			}
		})
	}
})

function isName (Nombre_Empresa){
	return /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/.test(Nombre_Empresa);
}






/*
var agregar = document.getElementById('Agregar');

agregar.addEventListener('click',()=>{
	
	Swal.fire({
		title: 'Registrar Nueva Empresa de Reciclaje',
		text: "¿Estas Seguro?",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, Registrar'
	}).then((result) => {
		if (result.isConfirmed) {
			Swal.fire(
				'Registrado!',
				'Your file has been deleted.',
				'success'
				)

			location.href ="?controller=empresaReciclaje&method=save"
			
		}
	})

});
*/