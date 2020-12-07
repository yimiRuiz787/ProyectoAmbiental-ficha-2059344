<?php  
	/**
	 * 
	 */
	require 'models/TipoMaterial.php';
	require 'models/Material.php';

	class TipoMaterialController
	{
		
		private $model;
		private $Material;

		public function __construct()
		{
			$this->model = new TipoMaterial;
			$this->Material = new Material;
		}

		public function index()
	    {
	    	$controller= 'Tipos de Material';
	        if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')){
	            require 'views/dashboard.php';
				$tipomateriales = $this->model->getAll();
				require 'views/TipoMaterial/list.php';
				require 'views/footer.php';
	            }else {
	            header('Location: ?controller=home');
	        }
	                
	    }

		public function add() //agrega
		{
			$controller= 'Tipos de Material';
			$metodo= 'Nuevo Tipos de Material';
			$name='tipoMaterial';
			require 'views/dashboard.php';
			$materiales=$this->Material->getAll();
			require 'views/TipoMaterial/new.php';
			require 'views/footer.php';
		}

		public function save()
		{
			$dataTipo=[
				'Nombre_Tipo_Material'=> $_POST['Nombre_Tipo_Material'],
				'Id_Material'=> $_POST['Id_Material'],
				'Puntos'=> $_POST['Puntos'],
				'Cantidad'=> $_POST['Cantidad'],

			];
			$this->model->newTipoMaterial($dataTipo);
			$lastIdTipo= $this->model->getLastId();
			$inventario = $this->model->saveInventario($lastIdTipo[0]->Id_Tipo);
			
			header('Location: ?controller=tipomaterial');
		}

		public function edit() //edita
		{
			$controller= 'Tipos de Material';
			$metodo= 'Editar Tipo de Material';
			$name='tipoMaterial';
			if (isset($_REQUEST['Id_Tipo'])) {
				$Id_Tipo = $_REQUEST['Id_Tipo'];
				$data = $this->model->getTipoMaterialById($Id_Tipo);
				$materiales = $this->Material->getAll();

				require 'views/dashboard.php';
				require 'views/TipoMaterial/edit.php';
				require 'views/footer.php';

			} else{
				echo "Error";
			}
		}

		public function update() //actualiza
		{
			if(isset($_POST)){
				$this->model->editTipoMaterial($_POST);
				header('Location: ?controller=tipomaterial');	
			}else{
				echo "Error";
			}
			
		}

		public function delete() //elimina
		{
			$this->model->deleteTipoMaterial($_REQUEST);
			header('Location: ?controller=tipomaterial');	
		}
	}