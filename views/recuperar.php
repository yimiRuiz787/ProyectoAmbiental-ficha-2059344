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
    <title>Recuperar Contraseña</title>

    <!-- Fontfaces CSS-->
    <!--<link href="assets/dashboard/vendor/css/font-face.css" rel="stylesheet" media="all">-->
    <link rel="shortcut icon" href="assets/dashboard/images/icon/icono.png" type="image/x-icon">
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

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="assets/dashboard/images/icon/L-LuzDary-large.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="?controller=Recuperar&method=update" method="post">
                             <?php
                             /* si error existe*/
                             if(isset($error['errorMessage'])) {
                                ?>
                                <!-- NOTA: el times simula el boton de cerrar la ventana emergente-->
                                <div class="alert alert-danger alert-dismissable alert-width" role="alert">
                                    <button class="close" data-dismiss="alert">&times;</button>
                                    <!-- nos imprime el error-->
                                    <p class="text-dark"><?php echo $error['errorMessage']; ?></p>
                                </div>
                                <?php
                            }
                            ?>

                            <?php
                             /* si error existe*/
                             if(isset($success['successMessage'])) {
                                ?>
                                <!-- NOTA: el times simula el boton de cerrar la ventana emergente-->
                                <div class="alert alert-success alert-dismissable alert-width" role="alert">
                                    <button class="close" data-dismiss="alert">&times;</button>
                                    <!-- nos imprime el error-->
                                    <p class="text-dark"><?php echo $success['successMessage']; ?></p>
                                </div>
                                <?php
                            }
                            ?>
                                <div class="form-group">
                                    <label>Correo</label>
                                    <input class="au-input au-input--full" type="email" name="Correo" placeholder="Ingresa el correo" 
                                    value="<?php echo isset ($error['Correo']) ? $error['Correo'] : ''?>">
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Recuperar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="assets/dashboard/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="assets/dashboard/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="assets/dashboard/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="assets/dashboard/vendor/slick/slick.min.js">
    </script>
    <script src="assets/dashboard/vendor/wow/wow.min.js"></script>
    <script src="assets/dashboard/vendor/animsition/animsition.min.js"></script>
    <script src="assets/dashboard/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="assets/dashboard/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="assets/dashboard/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="assets/dashboard/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="assets/dashboard/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/dashboard/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="assets/dashboard/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="assets/dashboard/js/main.js"></script>

</body>

</html>
<!-- end document-->