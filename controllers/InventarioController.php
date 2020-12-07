<?php  
	/**
	 * 
	 */
	require 'models/TipoMaterial.php';
	require 'models/Inventario.php';
	

	class InventarioController
	{
		
		private $model;
		

		public function __construct()
		{
			$this->model = new Inventario;
			
		}

		public function index()
		{
			$controller= 'Inventario';
			if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')){
				require 'views/dashboard.php';
				$inventarios = $this->model->getAll();
				require 'views/Inventario/list.php';
				require 'views/footer.php';
			}else {
				header('Location: ?controller=home');
			}

		}

	}