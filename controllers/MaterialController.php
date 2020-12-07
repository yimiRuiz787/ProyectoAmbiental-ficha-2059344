<?php  
	/**
	 * 
	 */
	require 'models/Material.php';

	class MaterialController
	{
		
		private $model;

		public function __construct()
		{
			$this->model = new Material;
		}

		public function index()
	    {
	    	$controller= 'Materiales';
	        if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')){
	            require 'views/dashboard.php';
				$users = $this->model->getAll();
				require 'views/material/list.php';
				require 'views/footer.php';
	        }else {
	            header('Location: ?controller=home');
	        }
	            
	    }
	    
		public function add() //agrega
		{
			$controller= 'Materiales';
			$metodo= 'Nuevo Material';
			$name='material';
			require 'views/dashboard.php';
			require 'views/material/new.php';
			require 'views/footer.php';
		}

		public function save()
		{
			$dataMaterial=[
				'Nombre_Material'=> $_POST['Nombre_Material'],
				'Descripcion'=> $_POST['Descripcion'],
			];

			$this->model->newMaterial($dataMaterial);
			header('Location: ?controller=material');
		}

		public function edit() //edita
		{
			$controller= 'Materiales';
			$metodo= 'Editar Material';
			$name='material';
			if (isset($_REQUEST['Id_Material'])) {
				$Id_Material = $_REQUEST['Id_Material'];
				$data = $this->model->getMaterialById($Id_Material);

				require 'views/dashboard.php';
				require 'views/material/edit.php';
				require 'views/footer.php';
			} else{
				echo "Error";
			}
		}

		public function update() //actualiza
		{
			if(isset($_POST)){
				$this->model->editMaterial($_POST);
				header('Location: ?controller=material');	
			}else{
				echo "Error";
			}
			
		}

		public function delete() //elimina
		{
			$this->model->deleteMaterial($_REQUEST);
			header('Location: ?controller=material');	
		}
	}