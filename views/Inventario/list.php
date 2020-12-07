
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">

			<div class="col-md-12">
				<!-- DATA TABLE -->
				<h3 class="title-1 m-b-35">Listada de Inventario</h3>
				<div class="table-data__tool">
					<div class="table-data__tool-left">
						<div class="rs-select2--light rs-select2--md">
							<h3 class="title-5 m-b-35">Inventario</h3>
						</div>
						<div class="rs-select2--light rs-select2--sm">								
						</div>
					</div>
					<div class="table-data__tool-right">
						
						<div class="rs-select2--dark rs-select2--sm rs-select2--dark2">

						</div>
					</div>
				</div>
				<div class="table-responsive table-data">
					<table id="dataTable" class="table table-data2">
						<thead>
							<tr>
								<th>
									<label class="au-checkbox">
										<input type="checkbox">
										<span class="au-checkmark"></span>
									</label>
								</th>
								<th>#</th>
								<th>Nombre Tipo de Material</th>
								<th>Cantidad en gramos</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($inventarios as $inventario) : ?>
								<tr>
									<td>
										<label class="au-checkbox">
											<input type="checkbox">
											<span class="au-checkmark"></span>
										</label>
									</td>
									<td><?php echo $inventario->Id_Inventario ?></td>
									<td><?php echo $inventario->Nombre_Tipo ?></td>
									<td><?php echo $inventario->Cantidad ?></td>
									<td>
										<div class="table-data-feature">
											<a href="?controller=entrega&method=new&Id_Inventario=<?php echo $inventario->Id_Inventario?>" class="au-btn au-btn-icon au-btn--green au-btn--small" >
												<i class="zmdi zmdi-plus"></i>Asignar</a>

												

											</div>
										</td>
									</tr>										

								<?php endforeach?>
							</tbody>
						</table>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>