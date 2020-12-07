<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container">
			<section class="row mt-5">
				<div class="card w-100 m-auto">
					<div class="card-header">
						Registrar nueva Entrada material
					</div>

					<div class="card-body w-100">
						<div class="card-tittle">
							<h3 class=" title-2">Entrada</h3>
						</div>
						<hr>
						<form id="form" action="" method="post">
							<div class="form-group">
								<?php $fcha = date("Y-m-d");?>
							
								<label>Fecha<span class="ast">*</span></label>
								<input type="date" id="Fecha" class="form-control" placeholder="Ingrese la fecha" value="<?php echo $fcha;?>" disabled>
							</div>
							<div class="form-group">
								<label>Tipo de Material<span class="ast">*</span></label>
								<div class="input-group">

									<select id="Id_Tipo" class="form-control">
										<option value="">Seleccione...</option>                    
										<?php
										foreach ($tipoMateriales as $tipoMaterial) {
											?>
											<option value="<?php echo $tipoMaterial->Id_Tipo?>"><?php echo $tipoMaterial->Nombre_Tipo_Material?></option>
											
											<?php                                       
										}
										?>
									</select>
									
								</div>						
							</div>
							
							<div class="form-group">
								<label>Peso de Material(Gramos)<span class="ast">*</span></label>
								<input type="number" id="Peso_Material" class="form-control" placeholder="Ingrese el peso del material">
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

							<div>
								
								<button name="Agregar" type="submit" class="botones au-btn  au-btn--green au-btn--small ">

									<span id="payment-button-amount">Guardar</span>
								</button>
								<a href="?controller=entrada" name="" class="botones btn btn-secondary ">

									Cancelar
								</a>
							</div>
						</div>	
					</div>		
				</form>

			</div>
		</section>
	</div>	
</div>
</div>
<script src="assets/dashboard/vendor/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="assets/js/entrada.js"></script>
