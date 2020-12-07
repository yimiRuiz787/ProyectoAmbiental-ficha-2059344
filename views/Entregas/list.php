<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">			
			<div class="col-md-12">
				<!-- DATA TABLE -->
				<h3 class="title-1 m-b-35">Inventario</h3>
				<div class="table-data__tool">
					<div class="table-data__tool-left">
						<div class="rs-select2--light rs-select2--md">
							<h3 class="title-5 m-b-35">Entregas</h3>
						</div>
						<div class="rs-select2--light rs-select2--sm">								
						</div>
					</div>
					<div class="table-data__tool-right">
						<?php if ($_SESSION['usuario']->Id_Rol != 2) {?>
						<a href="?controller=inventario" class="au-btn au-btn-icon au-btn--green au-btn--small" >
							<i class="zmdi zmdi-plus"></i>Agregar</a>
							<?php }?>
							<?php if ($_SESSION['usuario']->Id_Rol == 2) {?>		
							<a href="?controller=entrega&method=print" class="au-btn au-btn-icon au-btn--green au-btn--small" >
								<i ></i>Imprimir</a>
								<div class="rs-select2--dark rs-select2--sm rs-select2--dark2">

								</div>
								<?php }?>	
							</div>
						</div>
						<?php if ($_SESSION['usuario']->Id_Rol == 2) {  ?>
						<div class="table-responsive table-data">
							<table id="dataTable" class="table table-borderless table-striped table-earning">
								<thead>
									<tr>
										<th>Fecha</th>
										<th>Total de Material</th>
										<th>Descripción de Material</th>
										<th>Repesentante</th>
										<th>Estado</th>
										<th>Empleado</th>
										
									</tr>
								</thead>
								<tbody>
									<?php foreach ($entregas as $entrega):
									if($_SESSION['usuario']->Id_Usuario == $entrega->Id_Usuario || $_SESSION['usuario']->Id_Rol == 3){?>
									<tr>
										<td><?php echo $entrega->Fecha ?></td>
										<td><?php echo $entrega->Total_Material ?></td>
										<td><?php echo $entrega->Descripcion_Material ?></td>
										<td><?php echo $entrega->usuario ?></td>
										<?php  $estado = $entrega->estado ?>
										<?php if ($estado !='Activo') {?>				 
										<td><span class="status--denied"><?php echo $estado ?></td></span>

										<?php }else{ ?>	
										<td><span class="status--process"><?php echo $estado ?></td></span>
										<?php } ?>
										<td><?php echo $entrega->Empleado ?></td>
										
									</tr>
									<?php }?>										
									<?php endforeach?>
								</tbody>
							</table>										
						</div>
						<?php }else{ ?>
						<div class="table-responsive table-data">
							<table id="dataTable" class="table table-data2">
								<thead>
									<tr>
										<th>Fecha</th>
										<th>Total de Material</th>
										<th>Descripción de Material</th>
										<th>Repesentante</th>
										<th>Estado</th>
										<th>Empleado</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($entregas as $entrega):
									if($_SESSION['usuario']->Id_Usuario == $entrega->Id_Usuario || $_SESSION['usuario']->Id_Rol == 3){?>
									<tr>
										<td><?php echo $entrega->Fecha ?></td>
										<td><?php echo $entrega->Total_Material ?></td>
										<td><?php echo $entrega->Descripcion_Material ?></td>
										<td><?php echo $entrega->usuario ?></td>
										<?php  $estado = $entrega->estado ?>
										<?php if ($estado !='Activo') {?>				 
										<td><span class="status--denied"><?php echo $estado ?></td></span>

										<?php }else{ ?>	
										<td><span class="status--process"><?php echo $estado ?></td></span>
										<?php } ?>
										<td><?php echo $entrega->Empleado ?></td>
										<td>	
											<div class="table-data-feature">
												<a>                                        	
													<?php
													if ($entrega->Id_Estado ==1) {
													?>
													<a  href="?controller=entrega&method=updateStatusEntrega&Id_Entrega=<?php echo $entrega->Id_Entrega ?>" class="item" data-toggle="tooltip" data-placement="top" title="Inactivar" > <i class="fa fa-power-off"></i> </a>
													<?php
												}else  {
												?> 
												<a href="?controller=entrega&method=updateStatusEntrega&Id_Entrega=<?php echo $entrega->Id_Entrega ?>"  class="item" data-toggle="tooltip" data-placement="top" title="Activar"><i class="fa fa-check-square" ></i> </a>
												<?php 
											}
											?>
										</a>

										<a href="?controller=entrega&method=edit&Id_Entrega=<?php echo $entrega->Id_Entrega?>" class="item" data-toggle="tooltip" data-placement="top" title="Editar">
											<i class="zmdi zmdi-edit"></i>
										</a>
										<a href="?controller=entrega&method=delete&Id_Entrega=<?php echo $entrega->Id_Entrega?>" class="item" data-toggle="tooltip" data-placement="top" title="Eliminar">
											<i class="zmdi zmdi-delete"></i>
										</a>

									</div>
								</td>
							</tr>
							<?php }?>										
							<?php endforeach?>
						</tbody>
					</table>										
				</div>
				<?php } ?>		
			</div>	
		</div>
	</div>
</div>
