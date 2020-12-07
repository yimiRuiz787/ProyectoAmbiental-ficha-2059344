<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="col-md-12">
				<!-- DATA TABLE -->
				<h3 class="title-1 m-b-35">Listado Retiros</h3>
				<div class="table-data__tool">
					<div class="table-data__tool-left">
						<div class="rs-select2--light rs-select2--md">
							<h3 class="title-5 m-b-35">Retiros</h3>
						</div>
						<div class="rs-select2--light rs-select2--sm">								
						</div>
					</div>
					<?php if ($_SESSION['usuario']->Id_Rol == 1) { ?>
						<div class="table-data__tool-right">
							
								<div class="rs-select2--dark rs-select2--sm rs-select2--dark2">

								</div>
							</div>
						</div>
					<?php }else{?>
						<div class="table-data__tool-right">
							<a href="?controller=retiro&method=add" class="au-btn au-btn-icon au-btn--green au-btn--small" >
								<i class="zmdi zmdi-plus"></i>Retiro</a>
								<div class="rs-select2--dark rs-select2--sm rs-select2--dark2">

								</div>
							</div>
						</div>
					<?php }?>		
					<div class="table-responsive table-data">
						<?php if ($_SESSION['usuario']->Id_Rol == 1) {  ?>
							<table id="dataTable" class="table table-borderless table-striped table-earning">
								<thead>
									<tr>
										<th>
											<label class="au-checkbox">
												<input type="checkbox">
												<span class="au-checkmark"></span>
											</label>
										</th>
										<th>#</th>
										<th>Fecha</th>
										<th>Cantidad de puntos del Retiro</th>
										<th>Cliente</th>
										
									</tr>
								</thead>
								<tbody>
									<?php foreach ($retiros as $retiro) : ?>
										<tr>
											<td>
												<label class="au-checkbox">
													<input type="checkbox">
													<span class="au-checkmark"></span>
												</label>
											</td>
											<td><?php echo $retiro->Id_Retiro ?></td>
											<td><?php echo $retiro->Fecha ?></td>
											<td><?php echo $retiro->Cantidad_Puntos_de_Retiro ?></td>
											<td><?php echo $retiro->usuario ?></td>				
										</tr>										

									<?php endforeach?>
								</tbody>
							</table>
						<?php }else{ ?>	
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
										<th>Fecha</th>
										<th>Cantidad de puntos del Retiro</th>
										<th>Cliente</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($retiros as $retiro) : ?>
										<tr>
											<td>
												<label class="au-checkbox">
													<input type="checkbox">
													<span class="au-checkmark"></span>
												</label>
											</td>
											<td><?php echo $retiro->Id_Retiro ?></td>
											<td><?php echo $retiro->Fecha ?></td>
											<td><?php echo $retiro->Cantidad_Puntos_de_Retiro ?></td>
											<td><?php echo $retiro->usuario ?></td>				
											<td>
												<div class="table-data-feature">

													<a href="?controller=retiro&method=edit&Id_Retiro=<?php echo $retiro->Id_Retiro?>" class="item" data-toggle="tooltip" data-placement="top" title="Editar">
														<i class="zmdi zmdi-edit"></i>
													</a>
													<a href="?controller=retiro&method=delete&Id_Retiro=<?php echo $retiro->Id_Retiro?>" class="item" data-toggle="tooltip" data-placement="top" title="Eliminar">
														<i class="zmdi zmdi-delete"></i>
													</a>

												</div>
											</td>
										</tr>										

									<?php endforeach?>
								</tbody>
							</table>
						<?php } ?>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>