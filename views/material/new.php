<span class="ast">*</span><div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid"> 
			<section class="row mt-5">
				<div class="card w-100 m-auto">
					<div class="card-header">
						Agregar Material Reciclable
					</div>

					<div class="card-body w-100">
						<div class="card-tittle">
							<h3 class=" title-2">Material Reciclable</h3>
						</div>
						<hr>
						<form id="form">
							<div class="form-group">
								<label>Nombre Material<span class="ast">*</span></label>
								<input type="text" id="Nombre_Material" class="form-control" placeholder="Ingrese Nombre Del Material">
							</div>
							<div class="form-group">
								<label>Descripción de Material<span class="ast">*</span></label>
								<input type="text" id="Descripcion" class="form-control" placeholder="Ingrese La Descripción Del Material">
							</div>
							<button id="Agregar" type="submit" class="botones au-btn  au-btn--green au-btn--small ">

								<span id="payment-button-amount">Guardar</span>
							</button>
							<a href="?controller=material" id="" class="botones btn btn-secondary ">

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
<script src="assets/js/material.js"></script>