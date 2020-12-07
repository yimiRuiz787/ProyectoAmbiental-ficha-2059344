<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'assets/librerias/phpMailer/Exception.php';
require 'assets/librerias/phpMailer/PHPMailer.php';
require 'assets/librerias/phpMailer/SMTP.php';
/**
 * modelo del estado
 */
class User
{
    private $Id_Usuario;
    private $Nombre;
    private $Apellido;
    private $Cedula;
    private $Correo;
    private $Telefono;
    private $Direccion;
    private $foto;
    private $foto_url;
    private $contrasena;
    private $Id_Rol;
    private $Id_Estado;
    private $Id_Empresa_Reciclaje;
    private $Puntos_Acumulados;
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new Database;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getAll()
    {
        try {
            $strSql = 'SELECT m.*, u.Nombre as rol, e.Nombre as estado  FROM usuario m INNER JOIN rol u INNER JOIN estado e ON  u.Id_Rol=m.Id_Rol AND e.Id_Estado=m.Id_Estado';
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function PuntosRetiro($cliente)
    {
        try {
            $strSql = "SELECT SUM(Cantidad_Puntos_de_Retiro) as puntos_retiro FROM retiro WHERE Id_Usuario = '{$cliente}' ";
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
   public function getAllRepresentante()
    {
        try {
            $strSql = 'SELECT m.*, u.Nombre as rol, e.Nombre as estado, emp.Nombre_Empresa as empresa  FROM usuario m INNER JOIN rol u INNER JOIN estado e INNER JOIN empresa_reciclaje emp ON  u.Id_Rol=m.Id_Rol AND e.Id_Estado=m.Id_Estado AND emp.Id_Empresa_Reciclaje=m.Id_Empresa_Reciclaje';
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
   
    public function getAllCliente()
    {
        try {
            $strSql = 'SELECT * from usuario Where Id_Rol = 1';
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getAllClientes()
	{
		try {
			$strSql = 'SELECT m.*, u.Nombre as rol, e.Nombre as estado FROM usuario m INNER JOIN rol u INNER JOIN estado e  ON  u.Id_Rol=m.Id_Rol AND e.Id_Estado=m.Id_Estado ';
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
   

    public function newUser($data)
    {
        try {

                if($data['Id_Rol'] == 3 || $data['Id_Rol'] == 4 || $data['Id_Rol'] == 1) {
                    $data['Id_Empresa_Reciclaje'] = null;
                    $data['Puntos_Acumulados'] = null;         
                    $this->insertarUsuario($data);   
                }if($data['Id_Rol'] == 2){    
                        
                    $data['Puntos_Acumulados'] = null;
                    $this->insertarUsuario($data); 
                }
                          
        }catch(PDOException $e) {
            die($e->getMessage());
        }
        
    }
    
    public function correo($Correo)
    {
        try{
            $strSql="SELECT * FROM usuario WHERE Correo= :Correo"; 
            $arrayData=['Correo' =>$Correo];
            $query=$this->pdo->select($strSql,$arrayData);
            if(!empty($query)){ 
                return 1;
            }                 
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
     public function cedula($Cedula)
    {
        try{
            $strSql="SELECT * FROM usuario WHERE Cedula= :Cedula"; 
            $arrayData=['Cedula'=>$Cedula];
            $query=$this->pdo->select($strSql,$arrayData);
            if(!empty($query)){ 
                return 1;
            }                 
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public  function insertarUsuario($data)
    {
        try {            

           $caracteres = "qwertyuioplkjhgfdsazxcvbnmpoiuytrewqasdfghjklmnb";
           $contrasena = "";
           for ($i=0; $i <7 ; $i++){
               $rand = rand() % strlen($caracteres); 
               $contrasena .=substr($caracteres,$rand,1);             
            }

           $data['Clave'] = $contrasena;
           $data['Id_Estado'] = 1;
           $destino = $data['Correo'];
           $NombreUsuario = $data['Nombre'];
           $data['foto'] = $_FILES['foto']['name'];
		   $fototemporal = $_FILES['foto']['tmp_name'];
           $data['foto_url'] = "views/user/Images/" . $data['foto'];  
           copy($fototemporal,$data['foto_url']);  
           $this->pdo->insert('usuario', $data);

                    // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                //debug es para mirar los errores
                $mail->SMTPDebug = 0;                      // Enable verbose debug output
                //issSMTP protocolo  para enviar correo
                $mail->isSMTP();                                            // Send using SMTP
                //el host se  pone por donde quiere mandar correo en caso de que sea outlokk seria otro host en este es gmail
                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                //se pone el usuario por donde se va enviar el correo
                $mail->Username   = 'luzdaryreciclando777@gmail.com';                     // SMTP username
                $mail->Password   = 'luzdary123';                               // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $mail->setFrom('luzdaryreciclando777@gmail.com','Tienda LuzDary');
                $mail->addAddress($destino);     // Add a recipient
                
                // Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Asunto muy importante';
                $mail->Body    = '
                                <!DOCTYPE html>
                <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
                    xmlns:o="urn:schemas-microsoft-com:office:office">

                <head>
                    <meta charset="utf-8"> 
                    <meta name="viewport" content="width=device-width"> 
                    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
                    <meta name="x-apple-disable-message-reformatting"> 

                    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">


                    <style  type="text/css">
                    
                        html,
                        body {
                            margin: 0 auto !important;
                            padding: 0 !important;
                            height: 100% !important;
                            width: 100% !important;
                            background: #f1f1f1;
                        }

                  
                        * {
                            -ms-text-size-adjust: 100%;
                            -webkit-text-size-adjust: 100%;
                        }

                        div[style*="margin: 16px 0"] {
                            margin: 0 !important;
                        }


                 
                        table {
                            border-spacing: 0 !important;
                            border-collapse: collapse !important;
                            table-layout: fixed !important;
                            margin: 0 auto !important;
                        }


                        img {
                            -ms-interpolation-mode: bicubic;
                        }

                        a {
                            text-decoration: none;
                        }

                        *[x-apple-data-detectors],

                        .unstyle-auto-detected-links *,
                        .aBn {
                            border-bottom: 0 !important;
                            cursor: default !important;
                            color: inherit !important;
                            text-decoration: none !important;
                            font-size: inherit !important;
                            font-family: inherit !important;
                            font-weight: inherit !important;
                            line-height: inherit !important;
                        }

                        .a6S {
                            display: none !important;
                            opacity: 0.01 !important;
                        }

                  
                        .im {
                            color: inherit !important;
                        }

                        img.g-img+div {
                            display: none !important;
                        }

                        @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
                            u~div .email-container {
                                min-width: 320px !important;
                            }
                        }

                     
                        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
                            u~div .email-container {
                                min-width: 375px !important;
                            }
                        }

                      
                        @media only screen and (min-device-width: 414px) {
                            u~div .email-container {
                                min-width: 414px !important;
                            }
                        }
                    </style>

                  
                    <style>
                        .primary {
                            background: #30e3ca;
                        }

                        .bg_white {
                            background: #ffffff;
                        }

                        .bg_light {
                            background: #fafafa;
                        }

                        .bg_black {
                            background: #000000;
                        }

                        .bg_dark {
                            background: rgba(0, 0, 0, .8);
                        }

                        .email-section {
                            padding: 2.5em;
                        }

                      
                        .btn {
                            padding: 10px 15px;
                            display: inline-block;
                        }

                        .btn.btn-primary {
                            border-radius: 5px;
                            background: #30e3ca;
                            color: #ffffff;
                        }

                        .btn.btn-white {
                            border-radius: 5px;
                            background: #ffffff;
                            color: #000000;
                        }

                        .btn.btn-white-outline {
                            border-radius: 5px;
                            background: transparent;
                            border: 1px solid #fff;
                            color: #fff;
                        }

                        .btn.btn-black-outline {
                            border-radius: 0px;
                            background: transparent;
                            border: 2px solid #000;
                            color: #000;
                            font-weight: 700;
                        }

                        h1,
                        h2,
                        h3,
                        h4,
                        h5,
                        h6 {
                            font-family: "Lato", sans-serif;
                            color: #000000;
                            margin-top: 0;
                            font-weight: 400;
                        }

                        body {
                            font-family: "Lato", sans-serif;
                            font-weight: 400;
                            font-size: 15px;
                            line-height: 1.8;
                            color: rgba(0, 0, 0, .4);
                        }

                        a {
                            color: #30e3ca;
                        }

                       

                       

                        .logo h1 {
                            margin: 0;
                        }

                        .logo h1 a {
                            color: #30e3ca;
                            font-size: 24px;
                            font-weight: 700;
                            font-family: "Lato", sans-serif;
                        }

                        
                        .hero {
                            position: relative;
                            z-index: 0;
                        }

                        .hero .text {
                            color: rgba(0, 0, 0, .3);
                        }

                        .hero .text h2 {
                            color: #000;
                            font-size: 40px;
                            margin-bottom: 0;
                            font-weight: 400;
                            line-height: 1.4;
                        }

                        .hero .text h3 {
                            font-size: 24px;
                            font-weight: 300;
                        }

                        .hero .text h2 span {
                            font-weight: 600;
                            color: #30e3ca;
                        }


                       


                        .heading-section h2 {
                            color: #000000;
                            font-size: 28px;
                            margin-top: 0;
                            line-height: 1.4;
                            font-weight: 400;
                        }

                        .heading-section .subheading {
                            margin-bottom: 20px !important;
                            display: inline-block;
                            font-size: 13px;
                            text-transform: uppercase;
                            letter-spacing: 2px;
                            color: rgba(0, 0, 0, .4);
                            position: relative;
                        }

                        .heading-section .subheading::after {
                            position: absolute;
                            left: 0;
                            right: 0;
                            bottom: -10px;
                            content: "";
                            width: 100%;
                            height: 2px;
                            background: #30e3ca;
                            margin: 0 auto;
                        }

                        .heading-section-white {
                            color: rgba(255, 255, 255, .8);
                        }



                        .heading-section-white h2 {
                            color: #ffffff;
                        }

                        .heading-section-white .subheading {
                            margin-bottom: 0;
                            display: inline-block;
                            font-size: 13px;
                            text-transform: uppercase;
                            letter-spacing: 2px;
                            color: rgba(255, 255, 255, .4);
                        }


                        ul.social {
                            padding: 0;
                        }

                        ul.social li {
                            display: inline-block;
                            margin-right: 10px;
                        }

                       

                        .footer {
                            border-top: 1px solid rgba(0, 0, 0, .05);
                            color: rgba(0, 0, 0, .5);
                        }

                        .footer .heading {
                            color: #000;
                            font-size: 20px;
                        }

                        .footer ul {
                            margin: 0;
                            padding: 0;
                        }

                        .footer ul li {
                            list-style: none;
                            margin-bottom: 10px;
                        }

                        .footer ul li a {
                            color: rgba(0, 0, 0, 1);
                        }


                        @media screen and (max-width: 500px) {}
                    </style>


                </head>

                <body width="100%" style="margin: 0; padding: 0 !important;  background-color: #f1f1f1;">
                    <center style="width: 100%; background-color: #f1f1f1;">
                        <div
                            style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;  font-family: sans-serif;">
                            &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
                        </div>
                        <div style="max-width: 600px; margin: 0 auto;" class="email-container">
                            <!-- BEGIN BODY -->
                            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
                                style="margin: auto;">
                                <tr>
                                    <td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
                                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td class="logo" style="text-align: center;">
                                                    <h1><a href="#">Tienda Luz Dary</a></h1>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr><!-- end tr -->
                                <tr>
                                    <td valign="middle" class="hero bg_white" style="padding: 3em 0 2em 0;">
                                        <img src="images/email.png" alt=""
                                            style="width: 300px; max-width: 600px; height: auto; margin: auto; display: block;">
                                    </td>
                                </tr><!-- end tr -->
                                <tr>
                                    <td valign="middle" class="hero bg_white" style="padding: 2em 0 4em 0;">
                                        <table>
                                            <tr>
                                                <td>
                                                    <div class="text" style="padding: 0 2.5em; text-align: center;">
                                                        <h2>Bienvenid@ '.$NombreUsuario.' a Tienda Luz Dary</h2>
                                                        <h3>Tu contraseña es:</h3>
                                                        <h3><a>'.$contrasena.'</a></h3>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr><!-- end tr -->
                                <!-- 1 Column Text + Button : END -->
                            </table>
                            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
                                style="margin: auto;">
                                <tr>
                                    <td valign="middle" class="bg_light footer email-section">
                                        <table>
                                            <tr>
                                                <td valign="top" width="33.333%" style="padding-top: 20px;">
                                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                        <tr>
                                                            <td style="text-align: left; padding-right: 10px;">
                                                                <h3 class="heading">Acerca de</h3>
                                                                <p>En la tienda Luz Dary ayudamos con el reciclaje de los ciudadanos, queremos hacer parte de tu proceso al momento de
                                                                reciclar,</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td valign="top" width="33.333%" style="padding-top: 20px;">
                                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                        <tr>
                                                            <td style="text-align: left; padding-left: 5px; padding-right: 5px;">
                                                                <h3 class="heading">Contactos</h3>
                                                                <ul>
                                                                    <li><span class="text">Suba Tintal </span></li>
                                                                    <li><span class="text">Cra 67 </span></li>
                                                                    <li><span class="text">+57 987987</span></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td valign="top" width="33.333%" style="padding-top: 20px;">
                                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                        <tr>
                                                            <td style="text-align: left; padding-left: 10px;">
                                                                <h3 class="heading">Enlaces utiles</h3>
                                                                <ul>
                                                                    <li><a href="#">Pagina web</a></li>                                            
                                                                    <li><a href="#">Servicios</a></li>
                                                                    <li><a href="#">Puntos</a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr><!-- end: tr -->
                                <tr>
                                    <td class="bg_light" style="text-align: center;">
                                        <p>Tu registro fue realizado correctamente<a href="#"
                                                style="color: rgba(0,0,0,.8);"> Iniciar Sesion</a></p>
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </center>
                </body>

                </html> 
                ';                               
                //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }

        } catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function editUser($data)
    {
        try {
           $strWhere= 'Id_Usuario='.$data['Id_Usuario'];
           $fotooriginal = $_POST['foto'];
           $fotourloriginal = $_POST['foto_url'];
           $data['foto'] = $_FILES['foto']['name'];
		   $fototemporal = $_FILES['foto']['tmp_name'];
           $data['foto_url'] = "views/user/Images/" . $data['foto'];
           
           if (empty($fototemporal)) {
             
             $data['foto'] = $fotooriginal;
             $data['foto_url'] = $fotourloriginal;

           }else {
               
             unlink($fotourloriginal);
             copy($fototemporal,$data['foto_url']);

           }           
            $this->pdo->update('usuario',$data,$strWhere);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function deleteUser($data)
    {
        try{
            $strWhere='Id_Usuario='.$data['Id_Usuario'];
            $variablefoto='foto='.$data['foto'];
            $eliminarfoto =  "views/user/Images/" .$variablefoto;
			unlink($eliminarfoto);
            $this->pdo->delete('usuario',$strWhere);
        }catch(PDOException $e){
            die($e->getMessage());
        }

    }
    public function getUserById($Id_Usuario)
    {
        try{
            $strSql="SELECT * FROM usuario WHERE Id_Usuario= :Id_Usuario";
            $arrayData=['Id_Usuario'=>$Id_Usuario ];
            $query=$this->pdo->select($strSql,$arrayData);
            return $query;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
    public function editStatusUser($data)
    {
        try {   
            $strWhere = 'Id_Usuario ='. $data['Id_Usuario'];
            $this->pdo->update('usuario', $data, $strWhere);              
        } catch(PDOException $e) {
            die($e->getMessage());
        }       
    }
    public function Registrar($usuario)
    {
        try {
            
            $data['Nombre']=$usuario[0];
            $data['Apellido']=$usuario[1];
            $data['Cedula']=$usuario[2];
            $data['Correo']=$usuario[3];
            $data['Telefono']=$usuario[4];
            $data['Direccion']=$usuario[5];
            $data['Clave']=$usuario[6];
            $data['Id_Rol']=1;
            $data['Id_Estado']=1;
            $data['Id_Empresa_Reciclaje']= null;
            $data['Puntos_Acumulados']= null;
            $this->pdo->insert('usuario', $data);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function updatepassword($clavenueva){
        try {
            $data=$clavenueva;
            $strWhere =$_SESSION['usuario']->Id_Usuario;
                /* MySQL Conexion*/
            $link = mysqli_connect("localhost", "root", '', "luzdary");
                // Chequea coneccion
            if($link === false){
                die("ERROR: No pudo conectarse con la DB. " . mysqli_connect_error());
            }
                // Ejecuta la actualizacion del registro
            $sql = "UPDATE usuario SET Clave = '$data' WHERE Id_Usuario='$strWhere'";
            if(mysqli_query($link, $sql)){
                    //echo "Registro actualizado.";
            } else {
                 echo "ERROR: No se ejecuto $sql. " . mysqli_error($link);
            }
                // Cierra la conexion
            mysqli_close($link);        
            return true;
        } catch(PDOException $e) {  
            die($e->getMessage());
        }       
    }


    public function sendemail(){
        try{
            $mail = new PHPMailer(true);

            $nombre = $_POST['nombre'];
            $correo = $_POST['correo']; 
            $longitud = 8; 
            $pass = substr(md5(rand()),0,$longitud);


            try{
               $mail->SMTPDebug = 0;                      // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'luzdaryreciclando777@gmail.com';                     // SMTP username
                $mail->Password   = 'luzdary123';                               // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                //Recipients
                $mail->setFrom('luzdaryreciclando777@gmail.com', 'LuzDary');
                $mail->addAddress($correo, $nombre);     // Add a recipient

                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Hola Bienvenidos a la Tienda LuzDary';
                $mail->Body    = '
                                <!DOCTYPE html>
                <html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
                    xmlns:o="urn:schemas-microsoft-com:office:office">

                <head>
                    <meta charset="utf-8"> 
                    <meta name="viewport" content="width=device-width"> 
                    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
                    <meta name="x-apple-disable-message-reformatting"> 

                    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">


                    <style  type="text/css">
                    
                        html,
                        body {
                            margin: 0 auto !important;
                            padding: 0 !important;
                            height: 100% !important;
                            width: 100% !important;
                            background: #f1f1f1;
                        }

                  
                        * {
                            -ms-text-size-adjust: 100%;
                            -webkit-text-size-adjust: 100%;
                        }

                        div[style*="margin: 16px 0"] {
                            margin: 0 !important;
                        }


                 
                        table {
                            border-spacing: 0 !important;
                            border-collapse: collapse !important;
                            table-layout: fixed !important;
                            margin: 0 auto !important;
                        }


                        img {
                            -ms-interpolation-mode: bicubic;
                        }

                        a {
                            text-decoration: none;
                        }

                        *[x-apple-data-detectors],

                        .unstyle-auto-detected-links *,
                        .aBn {
                            border-bottom: 0 !important;
                            cursor: default !important;
                            color: inherit !important;
                            text-decoration: none !important;
                            font-size: inherit !important;
                            font-family: inherit !important;
                            font-weight: inherit !important;
                            line-height: inherit !important;
                        }

                        .a6S {
                            display: none !important;
                            opacity: 0.01 !important;
                        }

                  
                        .im {
                            color: inherit !important;
                        }

                        img.g-img+div {
                            display: none !important;
                        }

                        @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
                            u~div .email-container {
                                min-width: 320px !important;
                            }
                        }

                     
                        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
                            u~div .email-container {
                                min-width: 375px !important;
                            }
                        }

                      
                        @media only screen and (min-device-width: 414px) {
                            u~div .email-container {
                                min-width: 414px !important;
                            }
                        }
                    </style>

                  
                    <style>
                        .primary {
                            background: #30e3ca;
                        }

                        .bg_white {
                            background: #ffffff;
                        }

                        .bg_light {
                            background: #fafafa;
                        }

                        .bg_black {
                            background: #000000;
                        }

                        .bg_dark {
                            background: rgba(0, 0, 0, .8);
                        }

                        .email-section {
                            padding: 2.5em;
                        }

                      
                        .btn {
                            padding: 10px 15px;
                            display: inline-block;
                        }

                        .btn.btn-primary {
                            border-radius: 5px;
                            background: #30e3ca;
                            color: #ffffff;
                        }

                        .btn.btn-white {
                            border-radius: 5px;
                            background: #ffffff;
                            color: #000000;
                        }

                        .btn.btn-white-outline {
                            border-radius: 5px;
                            background: transparent;
                            border: 1px solid #fff;
                            color: #fff;
                        }

                        .btn.btn-black-outline {
                            border-radius: 0px;
                            background: transparent;
                            border: 2px solid #000;
                            color: #000;
                            font-weight: 700;
                        }

                        h1,
                        h2,
                        h3,
                        h4,
                        h5,
                        h6 {
                            font-family: "Lato", sans-serif;
                            color: #000000;
                            margin-top: 0;
                            font-weight: 400;
                        }

                        body {
                            font-family: "Lato", sans-serif;
                            font-weight: 400;
                            font-size: 15px;
                            line-height: 1.8;
                            color: rgba(0, 0, 0, .4);
                        }

                        a {
                            color: #30e3ca;
                        }

                       

                       

                        .logo h1 {
                            margin: 0;
                        }

                        .logo h1 a {
                            color: #30e3ca;
                            font-size: 24px;
                            font-weight: 700;
                            font-family: "Lato", sans-serif;
                        }

                        
                        .hero {
                            position: relative;
                            z-index: 0;
                        }

                        .hero .text {
                            color: rgba(0, 0, 0, .3);
                        }

                        .hero .text h2 {
                            color: #000;
                            font-size: 40px;
                            margin-bottom: 0;
                            font-weight: 400;
                            line-height: 1.4;
                        }

                        .hero .text h3 {
                            font-size: 24px;
                            font-weight: 300;
                        }

                        .hero .text h2 span {
                            font-weight: 600;
                            color: #30e3ca;
                        }


                       


                        .heading-section h2 {
                            color: #000000;
                            font-size: 28px;
                            margin-top: 0;
                            line-height: 1.4;
                            font-weight: 400;
                        }

                        .heading-section .subheading {
                            margin-bottom: 20px !important;
                            display: inline-block;
                            font-size: 13px;
                            text-transform: uppercase;
                            letter-spacing: 2px;
                            color: rgba(0, 0, 0, .4);
                            position: relative;
                        }

                        .heading-section .subheading::after {
                            position: absolute;
                            left: 0;
                            right: 0;
                            bottom: -10px;
                            content: "";
                            width: 100%;
                            height: 2px;
                            background: #30e3ca;
                            margin: 0 auto;
                        }

                        .heading-section-white {
                            color: rgba(255, 255, 255, .8);
                        }



                        .heading-section-white h2 {
                            color: #ffffff;
                        }

                        .heading-section-white .subheading {
                            margin-bottom: 0;
                            display: inline-block;
                            font-size: 13px;
                            text-transform: uppercase;
                            letter-spacing: 2px;
                            color: rgba(255, 255, 255, .4);
                        }


                        ul.social {
                            padding: 0;
                        }

                        ul.social li {
                            display: inline-block;
                            margin-right: 10px;
                        }

                       

                        .footer {
                            border-top: 1px solid rgba(0, 0, 0, .05);
                            color: rgba(0, 0, 0, .5);
                        }

                        .footer .heading {
                            color: #000;
                            font-size: 20px;
                        }

                        .footer ul {
                            margin: 0;
                            padding: 0;
                        }

                        .footer ul li {
                            list-style: none;
                            margin-bottom: 10px;
                        }

                        .footer ul li a {
                            color: rgba(0, 0, 0, 1);
                        }


                        @media screen and (max-width: 500px) {}
                    </style>


                </head>

                <body width="100%" style="margin: 0; padding: 0 !important;  background-color: #f1f1f1;">
                    <center style="width: 100%; background-color: #f1f1f1;">
                        <div
                            style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;  font-family: sans-serif;">
                            &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
                        </div>
                        <div style="max-width: 600px; margin: 0 auto;" class="email-container">
                            <!-- BEGIN BODY -->
                            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
                                style="margin: auto;">
                                <tr>
                                    <td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
                                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                                            <tr>
                                                <td class="logo" style="text-align: center;">
                                                    <h1><a href="#">Tienda Luz Dary</a></h1>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr><!-- end tr -->
                                <tr>
                                    <td valign="middle" class="hero bg_white" style="padding: 3em 0 2em 0;">
                                        <img src="images/email.png" alt=""
                                            style="width: 300px; max-width: 600px; height: auto; margin: auto; display: block;">
                                    </td>
                                </tr><!-- end tr -->
                                <tr>
                                    <td valign="middle" class="hero bg_white" style="padding: 2em 0 4em 0;">
                                        <table>
                                            <tr>
                                                <td>
                                                    <div class="text" style="padding: 0 2.5em; text-align: center;">
                                                        <h2>Bienvenid@ '.$nombre.' a Tienda Luz Dary</h2>
                                                        <h3>Tu contraseña es:</h3>
                                                        <h3><a>'.$pass.'</a></h3>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr><!-- end tr -->
                                <!-- 1 Column Text + Button : END -->
                            </table>
                            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
                                style="margin: auto;">
                                <tr>
                                    <td valign="middle" class="bg_light footer email-section">
                                        <table>
                                            <tr>
                                                <td valign="top" width="33.333%" style="padding-top: 20px;">
                                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                        <tr>
                                                            <td style="text-align: left; padding-right: 10px;">
                                                                <h3 class="heading">Acerca de</h3>
                                                                <p>En la tienda Luz Dary ayudamos con el reciclaje de los ciudadanos, queremos hacer parte de tu proceso al momento de
                                                                reciclar,</p>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td valign="top" width="33.333%" style="padding-top: 20px;">
                                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                        <tr>
                                                            <td style="text-align: left; padding-left: 5px; padding-right: 5px;">
                                                                <h3 class="heading">Contactos</h3>
                                                                <ul>
                                                                    <li><span class="text">Suba Tintal </span></li>
                                                                    <li><span class="text">Cra 67 </span></li>
                                                                    <li><span class="text">+57 987987</span></a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                                <td valign="top" width="33.333%" style="padding-top: 20px;">
                                                    <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                                                        <tr>
                                                            <td style="text-align: left; padding-left: 10px;">
                                                                <h3 class="heading">Enlaces utiles</h3>
                                                                <ul>
                                                                    <li><a href="#">Pagina web</a></li>                                            
                                                                    <li><a href="#">Servicios</a></li>
                                                                    <li><a href="#">Puntos</a></li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr><!-- end: tr -->
                                <tr>
                                    <td class="bg_light" style="text-align: center;">
                                        <p>Tu registro fue realizado correctamente<a href="#"
                                                style="color: rgba(0,0,0,.8);"> Iniciar Sesion</a></p>
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </center>
                </body>

                </html> 
                ';
                    $mail->send();
                    return $pass;
            }catch(Exeption $e){
                return false;
                die($e->getMessage());
            }   
            
        }catch(Exception $e){
            return false;
            die($e->getMessage());
        }
    }
}
