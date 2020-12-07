<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="col-md-12">
				<!-- DATA TABLE -->
				<h3 class="title-1 m-b-35">Empresas de Reciclaje</h3>
				<div class="table-data__tool">
					<div class="table-data__tool-left">
						<div class="rs-select2--light rs-select2--md">
							<h3 class="title-5 m-b-35">Empresas</h3>
						</div>
						<div class="rs-select2--light rs-select2--sm">								
						</div>
					</div>					
					<div class="table-data__tool-right">
						<a href="?controller=empresaReciclaje&method=new" class="au-btn au-btn-icon au-btn--green au-btn--small" ><i class="zmdi zmdi-plus"></i>Empresa</a>
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
									<th>Nit</th>
									<th>Nombre</th>
									<th>Teléfono</th>
									<th>Dirección</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody>						
								<?php foreach ($EmpresaReciclajes as $EmpresaReciclaje): ?>
									<tr>
										<td>
											<label class="au-checkbox">
												<input type="checkbox">
												<span class="au-checkmark"></span>
											</label>
										</td>
										<td>
											<?php echo $EmpresaReciclaje->Id_Empresa_Reciclaje ?>
										</td>
										<td>
											<?php echo $EmpresaReciclaje->Nit_Empresa ?>
										</td>
										<td>
											<?php echo $EmpresaReciclaje->Nombre_Empresa ?>
										</td>
										<td>
											<?php echo $EmpresaReciclaje->Telefono ?>
										</td>
										<td>
											<?php echo $EmpresaReciclaje->Direccion ?>
										</td>

										<td>
											<div class="table-data-feature">

												<a href="?controller=EmpresaReciclaje&method=edit&Id_Empresa_Reciclaje=<?php echo $EmpresaReciclaje->Id_Empresa_Reciclaje ?>" class="item" data-toggle="tooltip" data-placement="top" title="Editar">
													<i class="zmdi zmdi-edit"></i>
												</a>
												<a href="?controller=EmpresaReciclaje&method=delete&Id_Empresa_Reciclaje=<?php echo $EmpresaReciclaje->Id_Empresa_Reciclaje ?>" class="item" data-toggle="tooltip" data-placement="top" title="Eliminar">
													<i class="zmdi zmdi-delete"></i>
												</a>

											</div>
										</td>
									</tr>										
								<?php endforeach?>
							</tbody>
						</table>
					</div>	
				</div>		
			</div>
		</div>
	</div>
</div>	






