<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="col-md-12">				
				<div class="col-lg-8">
					<div class="table-responsive table-data">
						<div class="top-campaign">
							<h1 class="title-1 m-b-35">Roles</h1>						
							<div class="table-responsive">
								<table class="table table-top-campaign">
									<tbody>
										<?php foreach($roles as $role) :?>
											<tr>
												<td><?php echo $role->Id_Rol ?></td>
												<td><?php echo $role->Nombre ?></td>
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
	</div>
</div>




               