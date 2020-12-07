
<!DOCTYPE html>
<html>
<head>
	<title>Iniciar Sesión</title>
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
	<script src="assets/dashboard/vendor/jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" href="assets/login/css/login.css" type="text/css" media="all" />
	<link rel="stylesheet" href="assets/login/css/style.css" type="text/css" media="all" />
	<link href="assets/dashboard/css/theme.css" rel="stylesheet" media="all">
	
	
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
					        <form id="form" class="form" action="?controller=login&method=login" method="post">
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
					                <label>Correo </label>
										<input type="email" name="Correo" class="form-control" placeholder="Ingrese el Correo Electronico" value="<?php echo isset($error['errorMessage']) ? $error['Correo'] : '' ?>">
					                <i class="fas fa-check-circle"></i>
					                <i class="fas fa-exclamation-circle"></i>
					                <small>Error message</small>
					            </div>
					            <div class="form-control">
					                <label for="password">Contraseña</label>
					                <input type="password" id="password" name="Clave" placeholder="Ingrese Contraseña" id="password"/>
					                <i class="fas fa-check-circle"></i>
					                <i class="fas fa-exclamation-circle"></i>
					                <small>Error message</small>
								</div>
								<div class="form-control">
                                    <label class="contenedoraChecBox">
									  <input id="show_password" type="checkbox">Mirar
									 <span class="checkmark"></span>
									</label>
								</div>
					            
					            <p>¿Olvide mi contraseña? <a href="?controller=recuperar">Recuperar!</a></p>
					            <p>¿No tienes cuenta aun? <a href="?controller=registrar">Registrate!</a></p>			            
					            <button type="submit" class="loginhny-btn btn">Ingresar</button>
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
	
<script src="assets/login/js/contraseña.js"></script>    

</body>
</html>
<script>
	var id = document.getElementById("password").value;
$('#show_password').on('change',function(event){
   // Si el checkbox esta "checkeado"
   if($('#show_password').is(':checked')){
      // Convertimos el input de contraseña a texto.
      $('#password').get(0).type='text';
   // En caso contrario..
   } else {
      // Lo convertimos a contraseña.
	  $('#password').get(0).type='password';
	}
});
</script>
