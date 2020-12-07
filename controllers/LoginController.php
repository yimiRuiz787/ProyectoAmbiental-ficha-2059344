<?php

	require 'models/Login.php';
	/**
	 * home del proyecto
	 */
	class LoginController
	{
		private $model;

		public function __construct()
		{
			$this->model = new Login;
		}

		public function index()
		{
			if (isset($_SESSION['usuario'])) {
				header('Location: ?controller=home');
			} else{
				require "views/Login.php";
			}
		}

		public function login()
		{
			$validateUser = $this->model->validateUser($_POST);

			if ($validateUser === true) {
				header('Location: ?controller=home');
			}else{

				$error = ['errorMessage' => $validateUser,  'Correo' => $_POST['Correo']];
				require 'views/Login.php';
			}

		}

		public function logout()
		{
			if($_SESSION['usuario']) {
				session_destroy();
				header('Location: ?controller=web');
			}	
		}
		
	}