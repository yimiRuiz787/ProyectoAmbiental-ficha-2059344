<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<section class="row mt-5">
				<div class="card w-100 m-auto">
					<div class="card-header">
						Editar Retiro de Puntos
					</div>

					<div class="card-body w-100">
						<div class="card-tittle">
							<h3 class=" title-2">Retiro</h3>
						</div>
						<hr>
						<form action="" id="formU" method="post">
							<input type="hidden" id="Id_Retiro" value="<?php echo $data[0]->Id_Retiro ?>">
							<div class="form-group">
								<label>Fecha<span class="ast">*</span></label>
								<input type="date" id="Fecha" class="form-control" placeholder="Ingrese la fecha" value="<?php echo $data[0]->Fecha ?>">
							</div>
							<div class="form-group">
								<label>Cantidad de puntos retirados<span class="ast">*</span></label>
								<input type="number" id="Cantidad_Puntos_de_Retiro" class="form-control" placeholder="Ingrese la cantidad de puntos de retiro" value="<?php echo $data[0]->Cantidad_Puntos_de_Retiro ?>">
							</div>

							<div class="form-group">
								<label>Cliente<span class="ast">*</span></label>
								<select id="Id_Usuario" class="form-control">
									<option value="">Seleccione...</option>
									<?php
									foreach($usuarios as $usuario){
										if($usuario->Id_Usuario==$data[0]->Id_Usuario){
											?>
											<option selected value="<?php echo $usuario->Id_Usuario?>"><?php echo $usuario->Nombre?></option>
											<?php
										}else{?>
											<option  value="<?php echo $usuario->Id_Usuario?>"><?php echo $usuario->Nombre?></option>
										<?php }
									}
									?>
								</select>
							</div>
							<button id="" type="submit" class="botones au-btn  au-btn--green au-btn--small ">

								<span id="payment-button-amount">Guardar</span>
							</button>
							<a href="?controller=retiro" id="" class="botones btn btn-secondary ">

								Cancelar
							</a>

						</form>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<script src="assets/dashboard/vendor/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="assets/js/retiro.js"></script>