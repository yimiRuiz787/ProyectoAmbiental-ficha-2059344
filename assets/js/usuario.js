console.log("hola")

$('#form').submit(function(e) {
	e.preventDefault();
	var Nombre = $.trim($("#Nombre").val());
	var Apellido = $.trim($("#Apellido").val());
	var Cedula = $.trim($("#Cedula").val());
	var Correo = $.trim($("#Correo").val());
	var Telefono = $.trim($("#Telefono").val());
	var Direccion = $.trim($("#Direccion").val());
	var foto2 = $.trim($("#foto").val());
	var Id_Rol = $.trim($("#Id_Rol").val());
	var Id_Empresa_Reciclaje = $.trim($("#Id_Empresa_Reciclaje").val());

	
	if (Nombre.length == "" || Apellido.length == "" || Cedula.length == "" || Correo.length == "" || Telefono.length == "" || Direccion.length == "" ||  Id_Rol.length == "") {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'Debe completar todos los campos'
		});
	} else if (!isName(Nombre)) {
		Swal.fire({
			type: 'warning',
			icon: 'warning',
			title: 'Debe ingresar un Nombre Correcto.'
		});
	} else if (!isName(Apellido)) {
		Swal.fire({
			type: 'warning',
			icon: 'warning',
			title: 'Debe ingresar un Apellido Correcto.'
		});
	} else if (!isCorreo(Correo)) {
		Swal.fire({
			type: 'warning',
			icon: 'warning',
			title: 'Debe ingresar un Correo Correcto.'
		});
	}else if (Nombre.length > 30) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'Nombre demasiado largo.'
		});
	}else if (Apellido.length > 30) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'apellido demasiado largo.'
		});
	}else if (Cedula.length < 8 || Cedula.length > 10) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'Cédula debe tener entre 8 y 10 digitos'
		});
	}else if (Telefono.length < 6 || Telefono.length > 10) {
	Swal.fire({
		type: 'warning',
		icon: 'warning',
		title: 'Télefono debe tener entre 6 y 10 digitos'
	});
	}else if (Direccion.length < 8 || Direccion.length > 30) {
		Swal.fire({
			type: 'warning',
			icon: 'warning',
			title: 'Dirección tiene muchos o muy pocos caracteres  '
		});
	}else{ 
	var formData = new FormData();
	var foto = $('#foto')[0].files[0];
	formData.append('Nombre',Nombre);
	formData.append('Apellido',Apellido);
	formData.append('Cedula',Cedula);
	formData.append('Correo',Correo);
	formData.append('Telefono',Telefono);
	formData.append('Direccion',Direccion);
	formData.append('foto',foto);
	formData.append('Id_Rol',Id_Rol);
	formData.append('Id_Empresa_Reciclaje',Id_Empresa_Reciclaje);

		$.ajax({
			url:"?controller=user&method=save",
			type:"POST",
			/* data: {Nombre:Nombre,Apellido:Apellido,Cedula:Cedula,Correo:Correo,Telefono:Telefono,Direccion:Direccion,foto:foto,Id_Rol:Id_Rol,Id_Empresa_Reciclaje:Id_Empresa_Reciclaje}, */
			data: formData,
			contentType: false,
			processData: false,
			success: function (respuesta) {
				if (respuesta == 2) {
					Swal.fire({
						type: 'warning',
						icon: 'warning',
						title: 'Correo Duplicado'
					});
				}else if(respuesta == 3){
					Swal.fire({
						type: 'warning',
						icon: 'warning',
						title: 'Documento Duplicado'
					});
				}	
				else{
					Swal.fire({
						type: 'success',
						title: 'Registrado Correctamente',
						icon: 'success',
						confirmButtonColor: '#3085d6',
						confirmButtonText: 'Continuar'
					}).then((result) => {
						if (result.isConfirmed) {

							window.location.href = "?controller=User"

						}
					})
				}

			}
		})
	}
}
)


$('#formU').submit(function(e) {
	e.preventDefault();
	var Id_Usuario = $.trim($("#Id_Usuario").val());
	var Nombre = $.trim($("#Nombre").val());
	var Apellido = $.trim($("#Apellido").val());
	var Cedula = $.trim($("#Cedula").val());
	var Correo = $.trim($("#Correo").val());
	var Telefono = $.trim($("#Telefono").val());
	var Direccion = $.trim($("#Direccion").val());
	var foto2 = $.trim($("#foto").val());
	var foto_url = $.trim($("#foto_url").val());
	var Id_Rol = $.trim($("#Id_Rol").val());
	//var Id_Estado = $.trim($("#Id_Estado").val());
	var Id_Empresa_Reciclaje = $.trim($("#Id_Empresa_Reciclaje").val());
	var Puntos_Acumulados = $.trim($("#Puntos_Acumulados").val());


	if (Nombre.length == "" || Apellido.length == "" || Cedula.length == "" || Correo.length == "" || Telefono.length == "" || Direccion.length == "" || Id_Rol.length == "") {
		Swal.fire({
			type: 'warning',
			icon: 'warning',
			title: 'Debe completar todos los campos'
		});
	} else if (!isName(Nombre)) {
		Swal.fire({
			type: 'warning',
			icon: 'warning',
			title: 'Debe ingresar un Nombre Correcto.'
		});
	} else if (!isName(Apellido)) {
		Swal.fire({
			type: 'warning',
			icon: 'warning',
			title: 'Debe ingresar un Apellido Correcto.'
		});
	} else if (!isCorreo(Correo)) {
		Swal.fire({
			type: 'warning',
			icon: 'warning',
			title: 'Debe ingresar un Correo Correcto.'
		});
	}else if (Nombre.length > 30) {
		Swal.fire({
			type: 'warning',
			icon: 'warning',
			title: 'Nombre demasiado largo.'
		});
	} else if (Apellido.length > 30) {
		Swal.fire({
			type: 'warning',
			icon: 'warning',
			title: 'apellido demasiado largo.'
		});
	} else if (Cedula.length < 8 || Cedula.length > 10) {
		Swal.fire({
			type: 'warning',
			icon: 'warning',
			title: 'Cédula debe tener entre 8 y 10 digitos '
		});
	} else if (Telefono.length < 6 || Telefono.length > 10) {
		Swal.fire({
			type: 'warning',
			icon: 'warning',
			title: 'Télefono debe tener entre 6 y 10 digitos  '
		});
	} else if (Direccion.length < 8 || Direccion.length > 30) {
		Swal.fire({
			type: 'warning',
			icon: 'warning',
			title: 'Dirección tiene muchos o muy pocos caracteres  '
		});
	} else { 
		var formData = new FormData();
		var foto = $('#foto')[0].files[0];
		formData.append('Id_Usuario', Id_Usuario);
		formData.append('Nombre', Nombre);
		formData.append('Apellido', Apellido);
		formData.append('Cedula', Cedula);
		formData.append('Correo', Correo);
		formData.append('Telefono', Telefono);
		formData.append('Direccion', Direccion);
		formData.append('foto', foto);
		formData.append('foto_url', foto_url);
		formData.append('Id_Rol', Id_Rol);
		//formData.append('Id_Estado', Id_Estado);
		formData.append('Id_Empresa_Reciclaje', Id_Empresa_Reciclaje);
		formData.append('Puntos_Acumulados', Puntos_Acumulados);
		$.ajax({
			url:"?controller=user&method=update",
			type:"POST",
			data: formData,
			contentType: false,
			processData: false,
			success:function(data){
				Swal.fire({
					type:'success',
					title: 'Actualizado Correctamente',					
					icon: 'success',					
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Continuar'
				}).then((result) => {
					if (result.isConfirmed) {					
						window.location.href ="?controller=user"
					}
				})
			}
		})
	}
})

function isName (Nombre,Apellido){
	return /^[a-zA-ZÀ-ÿ\u00f1\u00d1]+(\s*[a-zA-ZÀ-ÿ\u00f1\u00d1]*)*[a-zA-ZÀ-ÿ\u00f1\u00d1]+$/.test(Nombre,Apellido);
}
function isCorreo(Correo){
	return /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/.test(Correo);
}