<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                </div>
            </div>
            <?php if ($_SESSION['usuario']->Id_Rol == 1) { ?>
           <div class="row m-t-25">
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c1">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-account-o"></i>
                                    </div>
                                    <div class="text">
                                        <h2><?php echo $_SESSION['usuario']->Puntos_Acumulados?></h2>
                                        <span>Pun Acumulados </span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart1"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c3">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-calendar-note"></i>
                                    </div>
                                    <div class="text">
                                        <h2><?php echo $PuntosRetiro[0]->puntos_retiro?></h2>
                                        <span>Puntos Retirados</span>

                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart3"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-sm-6 col-lg-3">
                        <div class="overview-item overview-item--c2">
                            <div class="overview__inner">
                                <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-shopping-cart"></i>
                                    </div>
                                    <div class="text">
                                        <h2><?php echo $_SESSION['usuario']->Puntos_Acumulados + $PuntosRetiro[0]->puntos_retiro
    
                                        ?></h2>
                                        <span>Puntos Totales</span>
                                    </div>
                                </div>
                                <div class="overview-chart">
                                    <canvas id="widgetChart2"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }else{}?>

            <section>
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <?php foreach ($usuarios as $usuario) :
                                           if($_SESSION['usuario']->Id_Usuario == $usuario->Id_Usuario){?>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title mb-3">Bienvenid@</strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="mx-auto d-block">
                                            <?php if (empty($usuario->foto)) {?>
                                            <img class="rounded-circle mx-auto d-block"
                                                src="views/user/Images/vacio.png" alt="Card image cap">
                                            <?php }else{ ?>
                                            <img class="rounded-circle mx-auto d-block"
                                                src="<?php echo $usuario->foto_url?>" alt="Card image cap">
                                            <?php }?>
                                            <h3 class="text-sm-center mt-2 mb-1"><?php echo $usuario->Nombre?></h3>
                                            <p class="text-muted text-center"><?php echo $usuario->Apellido?></p>
                                            <ul class="list-group list-group-unbordered mb-3">
                                                <li class="list-group-item">
                                                    <a style="color:#63c76a">Rol</b><a
                                                            class="float-right"><?php echo $usuario->rol?></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="card card-success">
                                    <div class="card-header">
                                        <strong class="card-title mb-3">Mis datos</strong>
                                    </div>
                                    <div class="card-body">

                                        <strong>
                                            <i></i>Telefono
                                        </strong>
                                        <p class="text-muted"><?php echo $usuario->Telefono?></p>
                                        <strong>
                                            <i></i>Correo
                                        </strong>
                                        <p><?php echo $usuario->Correo?></p>
                                        <strong>
                                            <i></i>Dirección
                                        </strong>
                                        <p><?php echo $usuario->Direccion?></p>
                                    </div>
                                    <div class="card-footer">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-tittle text-center">Editar datos personales</h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="?controller=User&method=updateDatos" method="post"
                                            enctype="multipart/form-data">
                                            <input type="hidden" name="Id_Usuario"
                                                value="<?php echo $_SESSION['usuario']->Id_Usuario?>">
                                            <input type="hidden" name="foto" value="<?php echo $usuario->foto?>">
                                            <input type="hidden" name="foto_url"
                                                value="<?php echo $usuario->foto_url?>">

                                            <div class="form-group row">
                                                <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
                                                <div class="col-sm-10">
                                                    <input type="number" name="Telefono" class="form-control"
                                                        value="<?php echo $usuario->Telefono?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="correo" class="col-sm-2 col-form-label">Correo</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="Correo" class="form-control"
                                                        value="<?php echo $usuario->Correo?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Dirección</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="Direccion" class="form-control"
                                                        value="<?php echo $usuario->Direccion?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">

                                                <label class="col-sm-2 col-form-label">Foto</label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="foto" accept=".jpg, .png, .gif"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10 float-right">
                                                    <button type="submit"
                                                        class="btn btn-block btn-success">Guardar</button>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="card-footer">

                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <?php endforeach?>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>
</div>