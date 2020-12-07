
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">

			<div class="col-md-12">
				<!-- DATA TABLE -->
				<h3 class="title-1 m-b-35">Listado Tipo Material</h3>
				<div class="table-data__tool">
					<div class="table-data__tool-left">
						<div class="rs-select2--light rs-select2--md">
							<h3 class="title-5 m-b-35">Tipos de Material</h3>
						</div>
						<div class="rs-select2--light rs-select2--sm">								
						</div>
					</div>
					<div class="table-data__tool-right">
						<a href="?controller=tipomaterial&method=add" class="au-btn au-btn-icon au-btn--green au-btn--small" >
							<i class="zmdi zmdi-plus"></i>Tipo Material</a>
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
									<th>Puntos</th>
									<th>CantidadG</th>
									<th>Material</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($tipomateriales as $tipomaterial) : ?>
									<tr>
										<td>
											<label class="au-checkbox">
												<input type="checkbox">
												<span class="au-checkmark"></span>
											</label>
										</td>
										<td><?php echo $tipomaterial->Id_Tipo ?></td>
										<td><?php echo $tipomaterial->Nombre_Tipo_Material ?></td>
										<td><?php echo $tipomaterial->Puntos ?></td>
										<td><?php echo $tipomaterial->Cantidad ?></td>
										<td><?php echo $tipomaterial->Nombre_Material ?></td>
										<td>
											<div class="table-data-feature">

												<a href="?controller=tipomaterial&method=edit&Id_Tipo=<?php echo $tipomaterial->Id_Tipo?>" class="item" data-toggle="tooltip" data-placement="top" title="Editar">
													<i class="zmdi zmdi-edit"></i>
												</a>
												<a href="?controller=tipomaterial&method=delete&Id_Tipo=<?php echo $tipomaterial->Id_Tipo?>" class="item" data-toggle="tooltip" data-placement="top" title="Eliminar">
													<i class="zmdi zmdi-delete"></i>
												</a>

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