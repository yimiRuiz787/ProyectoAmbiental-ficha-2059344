<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">			
			<div class="col-md-12">
				<!-- DATA TABLE -->
				<h3 class="title-1 m-b-35">Listado de Estados</h3>
				<div class="table-data__tool">
					<div class="table-data__tool-left">
						<div class="rs-select2--light rs-select2--md">
							<h3 class="title-5 m-b-35">Estados</h3>
						</div>
						<div class="rs-select2--light rs-select2--sm">								
						</div>
					</div>
					<div class="table-data__tool-right">
						<a href="?controller=estado&method=new" class="au-btn au-btn-icon au-btn--green au-btn--small" >
							<i class="zmdi zmdi-plus"></i>Agregar</a>
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
									<th>Nombre</th>
									<th>Acciones</th>
								</tr>
							</thead>

							<tbody>
								<?php foreach($estados as $estado) :?>
									<tr>
										<td>
											<label class="au-checkbox">
												<input type="checkbox">
												<span class="au-checkmark"></span>
											</label>
										</td>
										<td><?php echo $estado->Id_Estado ?></td>
										
										<?php  $Nombre = $estado->Nombre ?>
										<?php if ($Nombre !='Activo') {?>				 
											<td><span class="status--denied"><?php echo $Nombre ?></td></span>
											
										<?php }else{ ?>	
											<td><span class="status--process"><?php echo $Nombre ?></td></span>
											
										<?php } ?>	
										<td>
											<div class="table-data-feature">

												<a href="?controller=estado&method=edit&Id_Estado=<?php echo $estado->Id_Estado ?>" class="item" data-toggle="tooltip" data-placement="top" title="Editar">
													<i class="zmdi zmdi-edit"></i>
												</a>
												<a href="?controller=estado&method=delete&Id_Estado=<?php echo $estado->Id_Estado ?>" class="item" data-toggle="tooltip" data-placement="top" title="Eliminar">
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
