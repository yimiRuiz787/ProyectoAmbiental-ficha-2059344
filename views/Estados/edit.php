<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid"> 
			<section class="row mt-5">
				<div class="card w-100 m-auto">
					<div class="card-header">
						Editar Estado
					</div>

					<div class="card-body w-100">
						<div class="card-tittle">
							<h3 class=" title-2">Estado</h3>
						</div>
						<hr>
						<form action="" id="formU" method="post">
							<input type="hidden" id="Id_Estado" value="<?php echo $data[0]->Id_Estado ?>">
							<div class="form-group">
								<label>Nombre<span class="ast">*</span></label>
								<input type="text" id="Nombre" class="form-control" placeholder="Ingrese el nombre del estado" value="<?php echo $data[0]->Nombre ?>">
							</div>
							<div>
								<button id="" type="submit" class="botones au-btn  au-btn--green au-btn--small ">

									<span id="payment-button-amount">Guardar</span>
								</button>
								<a href="?controller=estado" id="" class="botones btn btn-secondary ">

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
<script src="assets/js/estado.js"></script>