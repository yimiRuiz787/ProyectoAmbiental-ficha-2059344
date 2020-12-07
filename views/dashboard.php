<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link rel="shortcut icon" href="assets/dashboard/images/icon/icono.png" type="image/x-icon">
    <link href="assets/dashboard/css/font-face.css" rel="stylesheet" media="all">
    <link href="assets/dashboard/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="assets/dashboard/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="assets/dashboard/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="assets/dashboard/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="assets/dashboard/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="assets/dashboard/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="assets/dashboard/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="assets/dashboard/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="assets/dashboard/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="assets/dashboard/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="assets/dashboard/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="assets/dashboard/css/theme.css" rel="stylesheet" media="all">

    <!--<link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.min.css">-->
    <link rel="stylesheet" type="text/css" href="assets/dataTable/dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="assets/dataTable/DataTables-1.10.21/css/dataTables.bootstrap4.min.css">


    
</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="?controller=dashboard">
                            <img src="assets/dashboard/images/icon/L-LuzDary-large.png" alt="Cool Admin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <?php if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')|| ($_SESSION['usuario']->rol == 'Cajero')|| ($_SESSION['usuario']->rol == 'Cliente')){ ?>
                        <?php if ($controller!= 'Entradas') { ?>
                        <li >
                            <a  href="?controller=entrada">
                            <i class="fas  fa-plus-square"></i>Entradas</a>
                        </li>
                        <?php }else{?>
                            <li class="active">
                                <a  href="?controller=entrada">
                                <i class="fas  fa-plus-square"></i>Entradas</a>
                            </li>
                        <?php }?>    
                        <?php }?>

                        <?php if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')|| ($_SESSION['usuario']->rol == 'Representante')){?>

                        <?php if ($controller!= 'Entregas') { ?>

                        <li>
                            <a  href="?controller=entrega">
                            <i class="fas  fa-location-arrow"></i>Entregas</a>
                        </li>
                        <?php }else{?>
                        <li class="active">
                            <a  href="?controller=entrega">
                            <i class="fas  fa-location-arrow"></i>Entregas</a>
                        </li>
                        <?php }?>
                        <?php }?>
                        <?php if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')){ ?>
                        <?php if ($controller!= 'Inventario') { ?>
                        <li >
                            <a  href="?controller=inventario">
                            <i class="fas  fa-archive"></i>Inventario</a>
                        </li>
                        <?php }else{?>
                            <li class="active">
                                <a  href="?controller=inventario">
                                <i class="fas  fa-archive"></i>Inventario</a>
                            </li>
                        <?php }?>    
                        <?php }?>
    
                        <?php if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')){?>
                        <?php if ($controller!= 'Empresas de reciclaje') { ?>    
                        <li>
                            <a  href="?controller=EmpresaReciclaje">
                            <i class="fas fa-truck"></i>Empresa de reciclaje</a>
                        </li>
                        <?php }else{?>
                        <li class="active">
                            <a  href="?controller=EmpresaReciclaje">
                            <i class="fas fa-truck"></i>Empresa de reciclaje</a>
                        </li>
                        <?php }?>
                        <?php }?>                    

                        <?php if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')){?>
                            <?php if ($controller!= 'Materiales') { ?>
                            <li>
                                <a  href="?controller=Material">
                                <i class="fas fa-leaf"></i>Material</a>
                            </li>
                        <?php }else{?>
                            <li class="active">
                                <a  href="?controller=Material">
                                <i class="fas fa-leaf"></i>Material</a>
                            </li>
                        <?php }?>
                        <?php }?>

                        <?php if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')){?>
                            <?php if ($controller!= 'Tipos de Material') { ?>
                            <li>
                                <a  href="?controller=TipoMaterial">
                                    <i class="fas  fa-tasks"></i>Tipo material</a>
                            </li>

                        <?php }else{?>
                            <li class="active">
                                <a  href="?controller=TipoMaterial">
                                    <i class="fas  fa-tasks"></i>Tipo material</a>
                            </li>
                        <?php }?>
                        <?php }?>

                        <?php if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')){?>
                        <?php if ($controller!= 'Usuarios') { ?>
                            <li>
                                <a  href="?controller=User">
                                <i class="fas fa-user"></i>Usuarios </a>
                            </li>
                        <?php }else{?>
                            <li class="active">
                                <a  href="?controller=User">
                                <i class="fas fa-user"></i>Usuarios </a>
                            </li>
                        <?php }?>
                        <?php }?>

                        <?php if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')){?>
                        <?php if ($controller!= 'Roles') { ?>
                        <li>
                            <a  href="?controller=Rol">
                            <i class="fas fa-group"></i>Roles </a>
                        </li>
                        <?php }else{?>
                            <li class="active">
                                <a  href="?controller=Rol">
                                <i class="fas fa-group"></i>Roles </a>
                            </li>
                        <?php }?>
                        <?php }?>

                        <?php if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')){?>
                        <?php if ($controller!= 'Estados') { ?>
                            <li >
                                <a  href="?controller=Estado">
                                <i class="fas fa-check-circle"></i>Estados</a>
                            </li>
                        <?php }else{?>    
                            <li class="active">
                                <a  href="?controller=Estado">
                                <i class="fas fa-check-square"></i>Estados</a>
                            </li>
                        <?php }?>
                        <?php }?>

                         <?php if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')|| ($_SESSION['usuario']->rol == 'Cliente')|| ($_SESSION['usuario']->rol == 'Cajero')){ ?>
                        <?php if ($controller!= 'Retiros') { ?>    
                            <li>
                                <a  href="?controller=retiro">
                                    <i class="fas  fa-share-square"></i>Retiros</a>
                            </li>
                        <?php }else{?>        
                            <li class="active">
                                <a  href="?controller=retiro">
                                    <i class="fas  fa-share-square"></i>Retiros</a>
                            </li>
                        <?php }?>
                        <?php }?>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="?controller=dashboard">
                    <img src="assets/dashboard/images/icon/L-LuzDary-large.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <?php if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')|| ($_SESSION['usuario']->rol == 'Cajero')|| ($_SESSION['usuario']->rol == 'Cliente')){ ?>
                        <?php if ($controller!= 'Entradas') { ?>
                        <li >
                            <a  href="?controller=entrada">
                            <i class="fas  fa-plus-square"></i>Entradas</a>
                        </li>
                        <?php }else{?>
                            <li class="active">
                                <a  href="?controller=entrada">
                                <i class="fas  fa-plus-square"></i>Entradas</a>
                            </li>
                        <?php }?>    
                        <?php }?>

                        <?php if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')|| ($_SESSION['usuario']->rol == 'Representante')){?>

                        <?php if ($controller!= 'Entregas') { ?>

                        <li>
                            <a  href="?controller=entrega">
                            <i class="fas  fa-location-arrow"></i>Entregas</a>
                        </li>
                        <?php }else{?>
                        <li class="active">
                            <a  href="?controller=entrega">
                            <i class="fas  fa-location-arrow"></i>Entregas</a>
                        </li>
                        <?php }?>
                        <?php }?>
                        <?php if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')){ ?>
                        <?php if ($controller!= 'Inventario') { ?>
                        <li >
                            <a  href="?controller=inventario">
                            <i class="fas  fa-archive"></i>Inventario</a>
                        </li>
                        <?php }else{?>
                            <li class="active">
                                <a  href="?controller=inventario">
                                <i class="fas  fa-archive"></i>Inventario</a>
                            </li>
                        <?php }?>    
                        <?php }?>
    
                        <?php if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')){?>
                        <?php if ($controller!= 'Empresas de reciclaje') { ?>    
                        <li>
                            <a  href="?controller=EmpresaReciclaje">
                            <i class="fas fa-truck"></i>Empresa de reciclaje</a>
                        </li>
                        <?php }else{?>
                        <li class="active">
                            <a  href="?controller=EmpresaReciclaje">
                            <i class="fas fa-truck"></i>Empresa de reciclaje</a>
                        </li>
                        <?php }?>
                        <?php }?>                    

                        <?php if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')){?>
                            <?php if ($controller!= 'Materiales') { ?>
                            <li>
                                <a  href="?controller=Material">
                                <i class="fas fa-leaf"></i>Material</a>
                            </li>
                        <?php }else{?>
                            <li class="active">
                                <a  href="?controller=Material">
                                <i class="fas fa-leaf"></i>Material</a>
                            </li>
                        <?php }?>
                        <?php }?>

                        <?php if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')){?>
                            <?php if ($controller!= 'Tipos de Material') { ?>
                            <li>
                                <a  href="?controller=TipoMaterial">
                                    <i class="fas  fa-tasks"></i>Tipo material</a>
                            </li>

                        <?php }else{?>
                            <li class="active">
                                <a  href="?controller=TipoMaterial">
                                    <i class="fas  fa-tasks"></i>Tipo material</a>
                            </li>
                        <?php }?>
                        <?php }?>

                        <?php if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')){?>
                        <?php if ($controller!= 'Usuarios') { ?>
                            <li>
                                <a  href="?controller=User">
                                <i class="fas fa-user"></i>Usuarios </a>
                            </li>
                        <?php }else{?>
                            <li class="active">
                                <a  href="?controller=User">
                                <i class="fas fa-user"></i>Usuarios </a>
                            </li>
                        <?php }?>
                        <?php }?>

                        <?php if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')){?>
                        <?php if ($controller!= 'Roles') { ?>
                        <li>
                            <a  href="?controller=Rol">
                            <i class="fas fa-group"></i>Roles </a>
                        </li>
                        <?php }else{?>
                            <li class="active">
                                <a  href="?controller=Rol">
                                <i class="fas fa-group"></i>Roles </a>
                            </li>
                        <?php }?>
                        <?php }?>

                        <?php if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')){?>
                        <?php if ($controller!= 'Estados') { ?>
                            <li >
                                <a  href="?controller=Estado">
                                <i class="fas fa-check-circle"></i>Estados</a>
                            </li>
                        <?php }else{?>    
                            <li class="active">
                                <a  href="?controller=Estado">
                                <i class="fas fa-check-square"></i>Estados</a>
                            </li>
                        <?php }?>
                        <?php }?>

                         <?php if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')|| ($_SESSION['usuario']->rol == 'Cliente')|| ($_SESSION['usuario']->rol == 'Cajero')){ ?>
                        <?php if ($controller!= 'Retiros') { ?>    
                            <li>
                                <a  href="?controller=retiro">
                                    <i class="fas  fa-share-square"></i>Retiros</a>
                            </li>
                        <?php }else{?>        
                            <li class="active">
                                <a  href="?controller=retiro">
                                    <i class="fas  fa-share-square"></i>Retiros</a>
                            </li>
                        <?php }?>
                        <?php }?>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="">
                                <ol class="breadcrumb float-sm-right">
                                  <li class="breadcrumb-item"><a href="?controller=home">Inicio</a></li>
                                  <?php if(isset($metodo)){                              
                                  ?>
                                  <li class="breadcrumb-item active"><a href="?controller=<?php echo ($name)?>"><?php echo ($controller)?></li></a>
                                  <?php }else if(isset($controller)){ ?>
                                    <li class="breadcrumb-item active"><?php echo ($controller)?></li>
                                  <?php } ?>
                                  <?php if(isset($metodo)){                              
                                  ?>
                                  <li class="breadcrumb-item active"><?php echo ($metodo)?></li>
                                  <?php }else{ ?>
                                  <?php } ?>
                                </ol>
                            </div>    
                            <div class="header-button">
                                
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">                                       
                                        <div class="content">
                                            <p class="js-acc-btn" href="#"><?php echo $_SESSION['usuario']->rol?></p>
                                            <a class="js-acc-btn" href="#"><?php echo $_SESSION['usuario']->Nombre?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $_SESSION['usuario']->Nombre?></a>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="?controller=web&method=logout">
                                                        <i class="zmdi zmdi-account"></i>Inicio</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="?controller=user&method=show">
                                                        <i class="fas fa-lock"></i>Cambiar Contraseña</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="?controller=login&method=logout">
                                                    <i class="zmdi zmdi-power"></i>Cerrar Sesión</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->

            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
       
<!-- end document-->
