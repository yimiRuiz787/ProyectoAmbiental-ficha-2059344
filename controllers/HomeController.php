<?php
require 'models/User.php';
	/**
	 * home del proyecto
	 */
	class HomeController
	{

		private $model;

		public function __construct()
		{
			$this->model = new User;
		}


		public function index()
		{
			$controller=null;
			$cliente = $_SESSION['usuario']->Id_Usuario;
			if (isset($_SESSION['usuario'])) {
			require 'views/dashboard.php';
			$usuarios = $this->model->getAll();
			$PuntosRetiro = $this->model->PuntosRetiro($cliente);
			require 'views/scripts.php';
			require 'views/home.php';
			require 'views/footer.php';
			}else{
				header('Location: ?controller=login');
			}
			
			
		}
		
	}