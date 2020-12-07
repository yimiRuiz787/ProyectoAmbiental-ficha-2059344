<span class="ast">*</span><div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid"> 
			<section class="row mt-5">
				<div class="card w-100 m-auto">
					<div class="card-header">
						Editar entrega material
					</div>

					<div class="card-body w-100">
						<div class="card-tittle">
							<h3 class=" title-2">Entrega</h3>
						</div>
						<hr>
						<form action="?controller=entrega&method=update" method="post">
							<input type="hidden" name="Id_Entrega" value="<?php echo $data[0]->Id_Entrega ?>">
							<div class="form-group">
								<label>Fecha<span class="ast">*</span></label>
								<input type="date" name="Fecha" class="form-control" placeholder="Ingrese la fecha" value="<?php echo $data[0]->Fecha ?>">
							</div>
							<div class="form-group">
								<label>Total de Material<span class="ast">*</span></label>
								<input type="number" name="Total_Material" class="form-control" placeholder="Ingrese el total Kg del material" value="<?php echo $data[0]->Total_Material ?>">
							</div>
							<div class="form-group">
								<label>Descripción del material<span class="ast">*</span></label>
								<input type="text" name="Descripcion_Material" class="form-control" placeholder="Ingrese la Descripción del material " value="<?php echo $data[0]->Descripcion_Material ?>">
							</div>
							<div class="form-group">
								<label>Representante<span class="ast">*</span></label>
								<select name="Id_Usuario" class="form-control">
									<option value="">Seleccione...</option>
									<?php
									foreach($users as $user){
										if($user->Id_Representante==$data[0]->Id_Representante){
											?>
											<option selected value="<?php echo $user->Id_Representante?>"><?php echo $user->Nombre?></option>
											<?php
										}else{?>
											<option  value="<?php echo $user->Id_Representante?>"><?php echo $user->Nombre?></option>
										<?php }
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label>Estado<span class="ast">*</span></label>
								<select name="Id_Estado" class="form-control">
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
								<button id="" type="submit" class="botones au-btn  au-btn--green au-btn--small ">

									<span id="payment-button-amount">Guardar</span>
								</button>
								<a href="?controller=entrega" id="" class="botones btn btn-secondary ">

									Cancelar
								</a>


							</div>

						</form>
					</div>
				</div>
			</section>
		</div>	
	</main>
</div>
<script src="assets/dashboard/vendor/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="assets/js/entrega.js"></script>	
