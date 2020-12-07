console.log("hola");

$('#form').submit(function(e) {

	e.preventDefault();

	var Id_Tipo_Material = $.trim($("#Id_Tipo_Material").val());
	var Fecha = $.trim($("#Fecha").val());
	var Total_Material =$.trim($("#Total_Material").val());
	var Descripcion_Material =$.trim($("#Descripcion_Material").val());
	var Id_Usuario =$.trim($("#Id_Usuario").val());
	var name = $("#Id_Usuario option:selected").text();

	var maxMaterial = $.trim($("#maxMaterial").val());


	console.log("material maximo" + maxMaterial);
	
	if (Fecha.length == "" || Total_Material.length == "" || Descripcion_Material.length == "" || Id_Usuario.length == "") {
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'Debe completar todos los campos'
		});
	}else if (Total_Material > maxMaterial){
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'No puedes Ingresar más material del que hay disponible.'
		});
	}else if (Total_Material <= 0){
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'El Total Material Debe Ser Positivo.'
		});
	}else if (Total_Material <= 9999){
		Swal.fire({
			type:'warning',
			icon: 'warning',
			title:'El Total Material Debe Ser igual o superior a 10 kg.'
		});
	}else{
		$.ajax({
			url:"?controller=entrega&method=save",
			type:"POST",
			datatype:"json",
			data: {Id_Tipo_Material:Id_Tipo_Material,Fecha:Fecha,Total_Material:Total_Material,Descripcion_Material:Descripcion_Material,Id_Usuario:Id_Usuario},
			success:function(data){
				Swal.fire({
					type:'success',
					title: 'Entrega Registrada corectamente',
					text:'Se han asignado '+Total_Material+' gramos de material al Represenatante '+name,					
					icon: 'success',					
					confirmButtonColor: '#3085d6',
					confirmButtonText: 'Continuar'
				}).then((result) => {
					if (result.isConfirmed) {					

						window.location.href ="?controller=entrega"

					}
				})
			}
		})
	}
})