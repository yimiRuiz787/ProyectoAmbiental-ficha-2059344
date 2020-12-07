<div class="main-content">
	<div class="section__content section__content--p30">
		<main class="container">
			<section class="row mt-5">
				<div class="card w-100 m-auto">
					<div class="card-header">
						Editar Empresa Reciclaje
					</div>

					<div class="card-body w-100">
						<div class="card-tittle">
							<h3 class=" title-2">Empresa de Reciclaje</h3>
						</div>
						<hr>
						<form action="" id="formU" method="post">

							<input type="hidden" id="Id_Empresa_Reciclaje" value="<?php echo $data[0]->Id_Empresa_Reciclaje ?>">

							<div class="form-group">
								<label>Nit<span class="ast">*</span></label>
								<input type="number" id="Nit_Empresa" class="form-control" placeholder="Ingrese el Nit completo" value="<?php echo $data[0]->Nit_Empresa ?>">
							</div>
							<div class="form-group">
								<label>Nombre<span class="ast">*</span></label>
								<input type="text" id="Nombre_Empresa" class="form-control" placeholder="Ingrese el nombre completo" value="<?php echo $data[0]->Nombre_Empresa ?>">
							</div>
							<div class="form-group">
								<label>Teléfono<span class="ast">*</span></label>
								<input type="number" id="Telefono" class="form-control" placeholder="Ingrese el teléfono completo" value="<?php echo $data[0]->Telefono ?>">
							</div>
							<div class="form-group">
								<label>Dirección<span class="ast">*</span></label>
								<input type="text" id="Direccion" class="form-control" placeholder="Ingrese la dirección completa" value="<?php echo $data[0]->Direccion ?>">
							</div>
							<div>
								<button id="" type="submit" class="botones au-btn  au-btn--green au-btn--small  ">

									<span id="payment-button-amount">Guardar</span>
								</button>
								<a href="?controller=entrada" id="" class="botones btn btn-secondary  ">

									Cancelar
								</a>


							</div>

						</form>
					</div>
				</div>
			</section>
		</main>
	</div>
</div>

<script src="assets/dashboard/vendor/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="assets/js/empresaReciclaje.js"></script>
