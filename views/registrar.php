<?php

$charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
$cad = "";
for ($i=0; $i<7; $i++) { 
	$cad .= substr($charset, rand(0, 59), 1);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrar</title>
    <!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords"
		content="Trendz Login Form Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta tag Keywords -->
	<!--/Style-CSS -->
	
	<link rel="stylesheet" href="assets/login/css/login.css" type="text/css" media="all" />
	<link rel="stylesheet" href="assets/login/css/style.css" type="text/css" media="all" />
	
	<!--//Style-CSS -->
	</head>
<body>
    <section class="w3l-forms-23">
		<div class="forms23-block-hny">
			<div class="wrapper">
				<!-- if logo is image enable this   
					<a class="logo" href="index.html">
					  <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
					</a> 
				-->
				<div class="d-grid forms23-grids">
					<div class="form23"> 
						<div class="main-bg">
							<h6 class="sec-one"><img src="assets/dashboard/images/icon/L-LuzDary-small-blanco (1).png"></h6>
							<div class="speci-login first-look">
								<img src="assets/login/images/user.png" alt="" class="img-responsive">
							</div>
						</div>
						<div class="container">
		<div class="card-body w-100">
                   <form action="?controller=user&method=create"  class="form" method="POST"> 
                    <?php 
                                    
					        		if (isset($error['errorMessage'])) {
					        		
					        		?>
					        			<div class="alert alert-danger alert-dismissable alert-width" role="alert">
										
										<p class="text-dark"><?php echo $error['errorMessage'] ?></p>
										</div>	
					        	<?php
										}
					        	?>
                    	<div class="form-control">
					                <label>Nombre</label>
										<input type="text" class="form-control" placeholder="Ingrese Nombre" name="nombre" id="nombre">
					                <i class="fas fa-check-circle"></i>
					                <i class="fas fa-exclamation-circle"></i>
					                <small>Error message</small>
					            </div>
					            <div class="form-control">
					                <label>Apellido</label>
										<input type="text" name="apellido" class="form-control" placeholder="Ingrese Apellido">
					                <i class="fas fa-check-circle"></i>
					                <i class="fas fa-exclamation-circle"></i>
					                <small>Error message</small>
					            </div>
					            <div class="form-control">
					                <label>Cedula</label>
										<input type="number" class="form-control" placeholder="Ingrese Cedula" name="cedula" id="cedula">
					                <i class="fas fa-check-circle"></i>
					                <i class="fas fa-exclamation-circle"></i>
					                <small>Error message</small>
					            </div>
					            <div class="form-control">
					                <label>Correo</label>
										<input type="email" class="form-control" placeholder="Ingrese Email" name="correo" id="email">
					                <i class="fas fa-check-circle"></i>
					                <i class="fas fa-exclamation-circle"></i>
					                <small>Error message</small>
					            </div>
					            <div class="form-control">
					                <label>Telefono</label>
										<input type="number" name="telefono" class="form-control" placeholder="Ingrese Telefono">
					                <i class="fas fa-check-circle"></i>
					                <i class="fas fa-exclamation-circle"></i>
					                <small>Error message</small>
					            </div>
					            <div class="form-control">
					                <label>Dirección</label>
										<input type="text" name="direccion" class="form-control" placeholder="Ingrese Dirección" id="direccion">
					                <i class="fas fa-check-circle"></i>
					                <i class="fas fa-exclamation-circle"></i>
					                <small>Error message</small>
					            </div>
					   
					            <p><a href="?controller=registrar&method=politicas">Estas aceptando nuestras politicas se seguridad</a></p>
				
					            <p><a href="?controller=login">Volver</a></p>			            
					            <button type="submit"  class="loginhny-btn btn">Registrar</button>
					        </form> 
				    	</div>
					</div>
				</div>
				<div class="w3l-copy-right text-center">
					<p>© 2020 Luz Dary
						</p>
				</div>
			</div>
		</div>
	</section>   
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script src="assets/js/enviar.js"></script>

</body>
</html>
