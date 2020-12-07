<div class="main-content">
	<div class="section__content section__content--p30">
        <div class="container-fluid"> 
		<section class="row mt-5">
			<div class="card w-100 m-auto">
				<div class="card-header">
					Editar Usuario
				</div>

				<div class="card-body w-100">
					<div class="card-tittle">
						<h3 class=" title-2">Usuario</h3>
					</div>
					<hr>
					<form action="" id="formU" method="post" enctype="multipart/form-data">

						<input type="hidden" id="Id_Usuario" value="<?php echo $data[0]->Id_Usuario?>">
						<!-- <input type="hidden" id="foto" value="<?php echo $data[0]->foto?>"> -->
						<input type="hidden" id="foto_url" value="<?php echo $data[0]->foto_url?>">


						<div class="form-group">
							<label>Nombre</label>
							<input type="text" id="Nombre" class="form-control" placeholder="Ingrese el nombre completo" value="<?php echo $data[0]->Nombre?>">

						</div>
						<div class="form-group">
							<label>Apellido</label>
							<input type="text" id="Apellido" class="form-control" placeholder="Ingrese el apellido completo" value="<?php echo $data[0]->Apellido?>">
						</div>
						<div class="form-group">
							<label>Cédula</label>
							<input type="number" id="Cedula" class="form-control" placeholder="Ingrese la cédula completa" value="<?php echo $data[0]->Cedula?>">
						</div>
						<div class="form-group">
							<label>Correo</label>
							<input type="text" id="Correo" class="form-control" placeholder="Ingrese el correo completo" value="<?php echo $data[0]->Correo?>">
						</div>
						<div class="form-group">
							<label>Teléfono</label>
							<input type="number" id="Telefono" class="form-control" placeholder="Ingrese el teléfono completo" value="<?php echo $data[0]->Telefono?>">
						</div>
						<div class="form-group">
							<label>Direccion</label>
							<input type="text" id="Direccion" class="form-control" placeholder="Ingrese la direccion completa" value="<?php echo $data[0]->Direccion?>">
						</div>
						<div class="form-group">
						    <label>Foto actual</label>
							<img  src="<?php echo $data[0]->foto_url ?>" class="img-thumbnail form-control" style="width: 140px; height: 140px;" >
						</div>
					     <div class="form-group">
							<label>Foto</label>
							<input type="file" id="foto" accept=".jpg, .png, .gif" class="form-control">
						</div>
						<div class="form-group">
							<label>Rol</label>
							<select id="Id_Rol" class="form-control">
								<option value="">Seleccione...</option>
								<?php
								foreach($roles as $rol){
									if($rol->Id_Rol==$data[0]->Id_Rol){
										?>
										<option selected value="<?php echo $rol->Id_Rol?>"><?php echo $rol->Nombre?></option>
										<?php
									}else{?>
										<option  value="<?php echo $rol->Id_Rol?>"><?php echo $rol->Nombre?></option>
									<?php }
								}
								?>
							</select>
						</div>
						<?php
						if ($data[0]->Id_Rol ==2) {
							?>
							<div class="form-group">
								<label>Empresa</label>
								<select id="Id_Empresa_Reciclaje" class="form-control" >
									<option value="">Seleccione...</option>
									<?php
									foreach($empresas as $empresa){
										if($empresa->Id_Empresa_Reciclaje==$data[0]->Id_Empresa_Reciclaje){
											?>
											<option selected value="<?php echo $empresa->Id_Empresa_Reciclaje?>"><?php echo $empresa->Nombre_Empresa?></option>
											<?php
										}else{?>
											<option  value="<?php echo $empresa->Id_Empresa_Reciclaje?>"><?php echo $empresa->Nombre_Empresa?></option>
										<?php }
									}
									?>
								</select>
							</div>
							<?php	
						}
						if ($data[0]->Id_Rol ==1) {
							?>
							<div class="form-group">
								<label>Puntos Acumulados</label>
								<input type="text" id="Puntos_Acumulados" class="form-control" placeholder="Ingrese los puntos" value="<?php echo $data[0]->Puntos_Acumulados?>" disabled>
							</div>
							<?php
						}
						?>
						<a href="?controller=user" id="" class="btn btn-secondary ">

							Cancelar
						</a>
						<button id="" type="submit" class="au-btn  au-btn--green au-btn--small ">

							<span id="payment-button-amount">Guardar</span>
						</button>
						
					</form>
				</div>
			</div>
		</section>
		
	</main>
</div>

<script src="assets/dashboard/vendor/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="assets/js/usuario.js"></script>
<script src="assets/js/user.js"></script>
