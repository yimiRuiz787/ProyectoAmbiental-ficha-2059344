<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">	
			<section class="row mt-5">
				<div class="card w-100 m-auto">
					<div class="card-header">
						Agregar Tipo Material
					</div>

					<div class="card-body w-100">
						<div class="card-tittle">
							<h3 class=" title-2">Tipo Material</h3>
						</div>
						<hr>
						<form action="" method="post" id="form">
							<div class="form-group">
								<label>Nombre Tipo Material<span class="ast">*</span></label>
								<input type="text" id="Nombre_Tipo_Material" class="form-control" placeholder="Ingrese Nombre Del Tipo Material">
							</div>

							<div class="form-group">
								<label>Material<span class="ast">*</span></label>
								<select id="Id_Material" class="form-control">
									<option value="">Seleccione...</option>                                
									<?php
									foreach ($materiales as $material) {
										?>
										<option value="<?php echo $material->Id_Material?>"><?php echo $material->Nombre_Material?></option>
										<?php                                       
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label>Puntos<span class="ast">*</span></label>
								<input type="number" id="Puntos" class="form-control" placeholder="Ingrese Los puntos a lo que equivalen el material">
							</div>
							<div class="form-group">
								<label>Cantidad en gramos<span class="ast">*</span></label>
								<input type="number" id="Cantidad" class="form-control" placeholder="Ingrese La cantidad de gramos">
							</div>
							<button id="" type="submit" class="botones au-btn  au-btn--green au-btn--small ">

								<span id="payment-button-amount">Guardar</span>
							</button>

							<a href="?controller=tipomaterial" id="" class="botones btn btn-secondary ">

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
<script src="assets/js/tipoMaterial.js"></script>
