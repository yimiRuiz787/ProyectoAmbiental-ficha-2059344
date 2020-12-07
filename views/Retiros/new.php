<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">

			<section class="row mt-5">
				<div class="card w-100 m-auto">
					<div class="card-header">
						Agregar Retiro de Puntos
					</div>

					<div class="card-body w-100">
						<div class="card-tittle">
							<h3 class=" title-2">Retiro</h3>
						</div>
						<hr>
						<form action="" method="post" id="form">
							<div class="form-group">
								<label>Fecha<span class="ast">*</span></label>
								<input type="date" id="Fecha" class="form-control" placeholder="Ingrese la fecha">
							</div>
							<div class="form-group">
								<label>Cantidad de puntos a retirar<span class="ast">*</span></label>
								<input type="number" id="Cantidad_Puntos_de_Retiro" class="form-control" placeholder="Ingrese los puntos que va a retirar">
							</div>

							<div class="form-group">
								<label>Cliente<span class="ast">*</span></label>
								<select id="Id_Usuario" class="form-control">
									<option value="">Seleccione...</option>                                
									<?php
									foreach ($usuarios as $usuario) {
										?>
										<option value="<?php echo $usuario->Id_Usuario?>"><?php echo $usuario->Nombre?></option>
										<?php                                       
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