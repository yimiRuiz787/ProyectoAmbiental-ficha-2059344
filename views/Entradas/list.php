<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">			
			<div class="col-md-12">
				<!-- DATA TABLE -->
				<h3 class="title-1 m-b-35">Mis Entradas</h3>
				<div class="table-data__tool">
					<div class="table-data__tool-left">
						<div class="rs-select2--light rs-select2--md">
							<h3 class="title-5 m-b-35">Entradas</h3>
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
							<a href="?controller=entrada&method=new" class="au-btn au-btn-icon au-btn--green au-btn--small" >
								<i class="zmdi zmdi-plus"></i>Entrada</a>
								<div class="rs-select2--dark rs-select2--sm rs-select2--dark2">

								</div>
							</div>
						</div>	
					<?php }?>
					<?php if ($_SESSION['usuario']->Id_Rol == 1) {  ?>	
					<div class="table-responsive table-data">
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
									<th>Fecha </th>
									<th>Peso del Material</th>
									<th>Puntos</th>
									<th>Cliente</th>
									<th>Estado</th>									
								</tr>
							</thead>
							<tbody>
								<?php foreach ($entradas as $entrada): ?>
									<tr>
										<td>
											<label class="au-checkbox">
												<input type="checkbox">
												<span class="au-checkmark"></span>
											</label>
										</td>
										<td><?php echo $entrada->Id_Entrada ?></td>
										<td><?php echo $entrada->Fecha ?></td>
										<td><?php echo $entrada->Peso_Material ?></td>
										<td><?php echo $entrada->Puntos ?></td>
										
										<td><?php echo $entrada->usuario ?></td>
										<?php  $estado = $entrada->estado ?>
										<?php if ($estado == 'Inactivo') {?>				 
											<td><span class="status--denied"><?php echo $estado ?></td></span>
											
											<?php }else{ ?>	
												<td><span class="status--process"><?php echo $estado ?></td></span>
												
												<?php } ?>
													
												
											
										</tr>										

									<?php endforeach?>

								</tbody>
							</table>		
						</div>		
					</div>
				<?php }else{ ?>
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
									<th>Fecha </th>
									<th>Peso del Material</th>
									<th>Puntos</th>
									<th>Cliente</th>
									<th>Estado</th>								
									<th>Acciones</th>
									
								</tr>
							</thead>
							<tbody>
								<?php foreach ($entradas as $entrada): ?>
									<tr>
										<td>
											<label class="au-checkbox">
												<input type="checkbox">
												<span class="au-checkmark"></span>
											</label>
										</td>
										<td><?php echo $entrada->Id_Entrada ?></td>
										<td><?php echo $entrada->Fecha ?></td>
										<td><?php echo $entrada->Peso_Material ?></td>
										<td><?php echo $entrada->Puntos ?></td>
										
										<td><?php echo $entrada->usuario ?></td>
										<?php  $estado = $entrada->estado ?>
										<?php if ($estado == 'Inactivo') {?>				 
											<td><span class="status--denied"><?php echo $estado ?></td></span>
											<td>
											<?php }else{ ?>	
												<td><span class="status--process"><?php echo $estado ?></td></span>
												<td>
												<?php } ?>
													
												<div class="table-data-feature">
													
													<a>                                        	
														<?php
														if ($entrada->Id_Estado ==1) {
															?>
															<a  href="?controller=entrada&method=updateStatus&Id_Entrada=<?php echo $entrada->Id_Entrada ?>" class="item" data-toggle="tooltip" data-placement="top" title="Inactivar" > <i class="fa fa-power-off"></i> </a>
															<?php
														}else  {
															?> 
															<a href="?controller=entrada&method=updateStatus&Id_Entrada=<?php echo $entrada->Id_Entrada ?>"  class="item" data-toggle="tooltip" data-placement="top" title="Activar"><i class="fa fa-check-square" ></i> </a>
															<?php 
														}
														?>
													</a>													

													<a href="?controller=entrada&method=edit&Id_Entrada=<?php echo $entrada->Id_Entrada ?>" class="item" data-toggle="tooltip" data-placement="top" title="Editar">
														<i class="zmdi zmdi-edit"></i>
													</a>
													<a onclick="AlertarEliminacion(<?php echo $entrada->Id_Entrada ?>)" class="item" data-toggle="tooltip" data-placement="top" title="Eliminar">
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
				<?php } ?>
				</div>
			</div>
		</div>	
	</div>	
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/entrada.js"></script>