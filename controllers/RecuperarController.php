<?php
  require 'models/Recuperar.php';
 
	class RecuperarController
	{
		public function __construct()
		{     
		$this->model= new Recuperar;       
		}

		public function index()
		{
			require 'views/recuperar.php';
		}

		public function update()
		{
			$email = $this->model->recuperarEmail($_POST);
			if($email == 1){ 
				$error = [
					'errorMessage' => 'El Correo ' . $_POST['Correo']. ' No esta Registrado',
					'Correo'       =>  $_POST['Correo'],
                //el email que este escrito en post con el fin de poder ponerlo en la vista
				];			
				require 'views/recuperar.php';

			}else {
				$success = [
				'successMessage' => '!Recuperación Exitosa! Hemos enviado un correo con su contraseña',
                //el email que este escrito en post con el fin de poder ponerlo en la vista
			];			
			require 'views/recuperar.php';    
			} 
		}
		
	}