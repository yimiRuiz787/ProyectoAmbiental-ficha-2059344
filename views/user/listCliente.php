<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">                       
            <div class="col-md-12">
                <!-- DATA TABLE -->
                <h3 class="title-1 m-b-35">Listado de Clientes</h3>
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <div class="rs-select2--light rs-select2--md">
                            <h3 class="title-5 m-b-35">Clientes</h3>
                        </div>
                        <div class="rs-select2--light rs-select2--sm">                              
                        </div>
                    </div>
                    <div class="table-data__tool-right">
                        <a href="?controller=user&method=new" class="au-btn au-btn-icon au-btn--green au-btn--small" >
                            <i class="zmdi zmdi-plus"></i>Agregar</a>
                            <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                            </div>
                        </div>
                    </div>
                    <!--<ul class="nav nav-tabs" " role="tablist">
						<li class="nav-item">
							<a class="nav-link"   href="?controller=User" role="tab" aria-controls="home" aria-selected="true">Usuarios</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="?controller=User&method=indexRepresentante"  role="tab" aria-controls="profile" aria-selected="false">Representante</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" id="contact-tab"  href="#" role="tab" aria-controls="contact" aria-selected="false">Clientes</a>
						</li>
					</ul><br><br>-->
                    <div class="navegador">
                        <a id="hola"  href="?controller=User"><i class="fas fa-user"></i> usuarios</a> 
                        <a id="hola" href="?controller=User&method=indexRepresentante"><i class="fas fa-briefcase"></i> Representante</a> 
                        <a  id="hola" class="coloractivado" href="#"><i class="fa fa-fw fa-envelope"></i> Cliente</a>                         
                   </div><br>

                    <div class="table-responsive table-data">
                        <table id="dataTable" class="table table-data2">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Cédula</th>
                                    <th>Correo</th>
                                    <th>Teléfono</th>
                                    <th>Dirección</th>
                                    <th>Rol</th>
                                    <th>Puntos Acumulados</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($users as $user) :?>
                                    <?php if ($user->Id_Rol ==1){?>
                                        <tr>
                                            <td><?php echo $user->Nombre?></td> 
                                            <td><?php echo $user->Apellido?></td> 
                                            <td><?php echo $user->Cedula?></td> 
                                            <td><?php echo $user->Correo?></td> 
                                            <td><?php echo $user->Telefono?></td> 
                                            <td><?php echo $user->Direccion?></td>  
                                            <td><?php echo $user->rol?></td>
                                            <td><?php echo $user->Puntos_Acumulados?></td>
                                            <td><?php echo $user->estado?></td>                                
                                            <td>
                                                <div class="table-data-feature">
                                                    <a>                                         
                                                        <?php
                                                        if ($user->Id_Estado ==1) {
                                                            ?>
                                                            <a href="?controller=user&method=updateStatusUser&Id_Usuario=<?php echo $user->Id_Usuario ?>" class="item" data-toggle="tooltip" data-placement="top" title="Inactivar" > <i class="fa fa-power-off"></i> </a>
                                                            <?php
                                                        }else  {
                                                            ?> 
                                                            <a href="?controller=user&method=updateStatusUser&Id_Usuario=<?php echo $user->Id_Usuario ?>"  class="item" data-toggle="tooltip" data-placement="top" title="Activar"><i class="fa fa-check-square" ></i> </a>
                                                            <?php 
                                                        }
                                                        ?>
                                                    </a>

                                                    <a href="?controller=user&method=edit&Id_Usuario=<?php echo $user->Id_Usuario?>" class="item" data-toggle="tooltip" data-placement="top" title="Editar">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </a>
                                                    <a  href="?controller=user&method=delete&Id_Usuario=<?php echo $user->Id_Usuario?>" class="item" data-toggle="tooltip" data-placement="top" title="Eliminar">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>                                     
                                    <?php } ?>    
                                <?php endforeach?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--
<script type="text/javascript">
    function del(id)
    {

    alertify.confirm('Alerta', '¿Desea inactivar el usuario?', function(
         ){ 
           alertify.success('Ok')
         window.location = "?controller=user&method=updateStatusUser&Id_Usuario="+id;

            }
                , function(){ alertify.error('Proceso Cancelado')});
    }
</script>-->