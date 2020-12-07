<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container">
			<section class="row mt-5">
				<div class="card w-100 m-auto">
					<div class="card-header">
						Información de la entrada
					</div>

					<div class="card-body w-100">
						<div class="card-tittle">
							<h3 class=" title-2">Entrada</h3>
						</div>
						<hr>
						<form action="" id="formU" method="post"> 
							<input type="hidden" id="Id_Entrada" value="<?php echo $data[0]->Id_Entrada ?>">
							<div class="form-group">
								<label>Fecha<span class="ast">*</span></label>
								<input type="date" id="Fecha" class="form-control" placeholder="Ingrese la fecha" value="<?php echo $data[0]->Fecha ?>">
							</div>
							<div class="form-group">
								<label>Tipo de Material<span class="ast">*</span></label>
								<div class="input-group">
									<select id="Id_Tipo" class="form-control">
										<option value="">Seleccione...</option>
										<?php
										foreach($tipoMaterialesEntrada as $tipoMaterial){
											if($tipoMaterial->Id_Tipo==$data[0]->Id_Tipo){
												?>
												<option selected value="<?php echo $tipoMaterial->Id_Tipo?>"><?php echo $tipoMaterial->tipoMaterial?></option>
												<?php
											}else{?>
												<option  value="<?php echo $tipoMaterial->Id_Tipo?>"><?php echo $tipoMaterial->tipoMaterial?></option>
											<?php }
										}
										?>
									</select>													
								</div>						
							</div>
							<div class="form-group">
								<label>Peso de Material<span class="ast">*</span></label>
								<input type="number" id="Peso_Material" class="form-control" placeholder="Ingrese el peso del material" value="<?php echo $data[0]->Peso_Material ?>">
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
							<div class="form-group">
								<label>Estado<span class="ast">*</span></label>
								<select id="Id_Estado" class="form-control">
									<option value="">Seleccione...</option>
									<?php
									foreach($estados as $estado){
										if($estado->Id_Estado==$data[0]->Id_Estado){
											?>
											<option selected value="<?php echo $estado->Id_Estado?>"><?php echo $estado->Nombre?></option>
											<?php
										}else{?>
											<option  value="<?php echo $estado->Id_Estado?>"><?php echo $estado->Nombre?></option>
										<?php }
									}
									?>
								</select>
							</div>
							<div>

								<button type="submit" class="botones au-btn  au-btn--green au-btn--small ">

									<span id="payment-button-amount">Guardar</span>
								</button>
								<a href="?controller=entrada" id="" class="botones btn btn-secondary ">

									Cancelar
								</a>
							</div>

						</form>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<script src="assets/dashboard/vendor/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="assets/js/entrada.js"></script>
