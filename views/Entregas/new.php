<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid"> 
			<section class="row mt-5">
				<div class="card w-100 m-auto">
					<div class="card-header">
						Nueva Entrega
					</div>

					<div class="card-body w-100">
						<div class="card-tittle">
							<h3 class=" title-2">Entrega</h3>
						</div>
						<hr>
						<form action="" id="form" method="post">
							<input type="hidden" id="Id_Tipo_Material" value="<?php echo $data[0]->Id_Tipo_Material ?>">
							<input type="hidden" id="maxMaterial" value="<?php echo $data[0]->Cantidad ?>">
							<div class="form-group">
								<label>Fecha<span class="ast">*</span></label>
								<input type="date" id="Fecha" class="form-control" placeholder="Ingrese la fecha">
							</div>
							<div class="form-group">
								<label>Total de Material<span class="ast">*</span></label>
								<input type="number" id="Total_Material" class="form-control" placeholder="Ingrese el total de material para asignar" value="<?php echo $data[0]->Cantidad ?>">
							</div>
							<div class="form-group">
								<label>Descripción<span class="ast">*</span></label>
								<input type="text" id="Descripcion_Material" class="form-control" placeholder="Ingrese una Descripción">
							</div>						
							<div class="form-group">
								<label>Representante<span class="ast">*</span></label>
								<select id="Id_Usuario" class="form-control">
									<option value="">Seleccione...</option>                                
									<?php
									foreach ($users as $user) {
										?>
										<option value="<?php echo $user->Id_Usuario?>"><?php echo $user->Nombre?></option>
										<?php                                       
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

						</from>		
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<script src="assets/dashboard/vendor/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="assets/js/entrega.js"></script>	