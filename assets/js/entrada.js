console.log("hola")

$('#form').submit(function(e) {
	e.preventDefault();
	var Fecha = $.trim($("#Fecha").val());
	var Id_Tipo = $.trim($("#Id_Tipo").val());
	var Peso_Material = $.trim($("#Peso_Material").val());
	var Puntos = Peso_Material * 10 / 1000;


	var Id_Usuario =$.trim($("#Id_Usuario").val());
	var name = $("#Id_Usuario option:selected").text();

	
	
	if (Fecha.length == "" || Id_Tipo.length == "" || Peso_Material.length == "" || Id_Usuario.length == "" ) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'Debe completar todos los campos'
		});
	}else if (Peso_Material <= 0) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'El peso debe ser positivo.'
		});
	}else{
		$.ajax({
			url:"?controller=entrada&method=save",
			type:"POST",
			datatype:"json",
			data: {Fecha:Fecha,Id_Tipo:Id_Tipo,Peso_Material:Peso_Material,Puntos:Puntos,Id_Usuario:Id_Usuario},
			success:function(data){
				Swal.fire({
					type:'success',
					title: 'Entrada Registrada corectamente',
					text:'Se han asignado '+Puntos+' Puntos al Cliente '+name,					
					icon: 'success',					
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Continuar'
				}).then((result) => {
					if (result.isConfirmed) {					

						window.location.href ="?controller=entrada"

					}
				})
			}
		})
	}
})


$('#formU').submit(function(e) {

	e.preventDefault();
	var Id_Entrada = $.trim($("#Id_Entrada").val());
	var Fecha = $.trim($("#Fecha").val());
	var Id_Tipo = $.trim($("#Id_Tipo").val());
	var Peso_Material = $.trim($("#Peso_Material").val());
	var Puntos = Peso_Material * 10 / 1000;
	var Id_Estado = $.trim($("#Id_Estado").val());
	var Id_Usuario =$.trim($("#Id_Usuario").val());
	var name = $("#Id_Usuario option:selected").text();
	


	
	if (Fecha.length == "" || Id_Tipo.length == "" || Peso_Material.length == "" || Id_Usuario.length == "" ) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'Debe completar todos los campos'
		});
	}else if (Peso_Material <= 0) {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'El peso debe ser positivo.'
		});
	}else{
		$.ajax({
			url:"?controller=entrada&method=update",
			type:"POST",
			datatype:"json",
			data: {Id_Entrada:Id_Entrada,Fecha:Fecha,Id_Tipo:Id_Tipo,Peso_Material:Peso_Material,Puntos:Puntos,Id_Usuario:Id_Usuario,Id_Estado:Id_Estado},
			success:function(data){
				Swal.fire({
					type:'success',
					title: 'Entrada Actualizada corectamente',
					text:'Se han asignado '+Puntos+' Puntos al Cliente '+name,					
					icon: 'success',					
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Continuar'
				}).then((result) => {
					if (result.isConfirmed) {					

						window.location.href ="?controller=entrada"

					}
				})
			}
		})
	}
})





function AlertarEliminacion(id){
	
	console.log("el id es "+ id)
	

	Swal.fire({
		title: '¿Deseas Eliminar este registro?',
		text: "No podras recuperarlo!",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#59bd60',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Si, Eliminar!'
	}).then((result) => {
		if (result.isConfirmed) {

			Swal.fire({
				type:'success',
				title: 'Eliminado!',
				text:'El registro ha sido eliminado.',					
				icon: 'success',					
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Continuar'
			}).then((result) => {
				if (result.isConfirmed) {					

					window.location.href ="?controller=entrada&method=delete&Id_Entrada="+id

				}
			})

		}
	})

}














/*// declarar array que tendra el tipo de material
var arrTipoMateriales=[]

$("#addElement").click(function(e) {
	e.preventDefault()
	
	
	let idTipoMaterial=$("#Id_Tipo").val()
	let nameTipoMaterial=$("#Id_Tipo option:selected").text()

	if (idTipoMaterial !='') {
		if (typeof existTipoMaterial(idTipoMaterial)==='undefined'){
			arrTipoMateriales.push({
				'Id_Tipo':idTipoMaterial,
				'nameTipoMaterial':nameTipoMaterial
			})			
		}else{
			alert('El Tipo de material ya esta seleccionado')
		}
		showTipoMaterial()
	}else{
		alert("debe seleccionar un tipo de material")
	}	

});	

function existTipoMaterial(idTipoMaterial){
	let existTipoMaterial=arrTipoMateriales.find(function(tipoMaterial){
		return tipoMaterial.Id_Tipo==idTipoMaterial
	})
	return existTipoMaterial
}

function showTipoMaterial(){
	$("#list-tipoMaterial").empty()

	arrTipoMateriales.forEach(function (tipoMaterial){
		$("#list-tipoMaterial").append('<div class="form-group"><button onclick="removeElement('+tipoMaterial.Id_Tipo+')" class="btn btn-danger">X</button><span>'+tipoMaterial.nameTipoMaterial+'</span></div>')
	})
}

function removeElement(idTipoMaterial) {
	let index = arrTipoMateriales.indexOf(existTipoMaterial(idTipoMaterial))
	arrTipoMateriales.splice(index, 1)
	showTipoMaterial()

}

$('#submit').click(function(e){
	e.preventDefault()

	let url="?controller=entrada&method=save"
	let params={
		fecha:$('#Fecha').val(),
		peso_Material:$('#Peso_Material').val(),
		puntos:$('#Puntos').val(),
		id_Cliente:$('#Id_Cliente').val(),
		id_Usuario:$('#Id_Usuario').val(),
		tipoMaterial: arrTipoMateriales		
	}
	$.post(url, params, function(response){
		if (typeof response.error !=='undefined') {
			alert(response.message)
		}else{
			alert("Inserción Satisfactoria")
			location.href ="?controller=entrada"
		}
	}, 'json').fail(function(error){
		alert("Inserción fallida("+error.responseText+")")
	});

});



$('#update').click(function(e){
	e.preventDefault()

	let url="?controller=entrada&method=update"
	let params={
		Id_Entrada:$('#Id_Entrada').val(),
		fecha:$('#Fecha').val(),
		peso_Material:$('#Peso_Material').val(),
		puntos:$('#Puntos').val(),
		Id_Cliente:$('#Id_Cliente').val(),
		Id_Usuario:$('#Id_Usuario').val(),
		Id_Estado:$('#Id_Estado').val(),
		tipoMaterial: arrTipoMateriales		
	}
	$.post(url, params, function(response){
		if (typeof response.error !=='undefined') {
			alert(response.message)
		}else{
			alert("Actualización Satisfactoria")
			location.href ="?controller=entrada"
		}
	}, 'json').fail(function(error){
		alert("Actualización fallida("+error.responseText+")")
	});

});
*/