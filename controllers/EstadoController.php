<?php

	/**
	 * 
	 */

	require 'models/Estado.php';
	
	class EstadoController
	{
		private $model;
		
		
		
		public function __construct()
		{
			$this->model = new Estado;
		}


		public function index()
	    {
	    	$controller= 'Estados';
	        if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')){
	            require 'views/dashboard.php';
				$estados = $this->model->getAll();
				require 'views/Estados/list.php';
				require 'views/footer.php';
	        }else {
	            header('Location: ?controller=home');
	        }
	            
	    }
    
		public function new()
		{
			$controller= 'Estados';
			$metodo= 'Nuevo Estado';
			$name='estado';
			require 'views/dashboard.php';
			require 'views/Estados/new.php';
			require 'views/footer.php';
		}

		public function save ()
		{
			$dataEstado=[
				'Nombre'=> $_POST['Nombre']
			];
			$this->model->newEstado($dataEstado);
			header('Location: ?controller=estado');
		}

		public function edit()
		{
			$controller= 'Estados';
			$metodo= 'Editar Estado';
			$name='estado';
			if(isset($_REQUEST['Id_Estado'])) {
				$Id_Estado = $_REQUEST['Id_Estado'];
				$data = $this->model->getById($Id_Estado);
				require 'views/dashboard.php';
				require 'views/Estados/edit.php';
				require 'views/footer.php';
			} else {
				echo "Error";
			}
		}

		// Realiza el proceso de actualizar
		public function update()
		{
			if(isset($_POST)) {
				$this->model->editEstado($_POST);			
				header('Location: ?controller=estado');				
			} else {
				echo "Error";
			}
		}
		public function delete()
		{			
			$this->model->deleteEstado($_REQUEST);		
			header('Location: ?controller=estado');
		}
	}	