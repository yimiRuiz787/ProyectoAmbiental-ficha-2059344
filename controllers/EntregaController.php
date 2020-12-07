<?php

	/**
	 * 
	 */
	require 'models/Entrada.php';
	require 'models/Entrega.php';
	require 'models/User.php';
	require 'models/Estado.php';
	require 'models/Inventario.php';

	class EntregaController
	{
		private $model;
		private $modelEntrada;
		private $user;
		private $estado;
		private $entrada;
		private $inventario;
		
		
		
		public function __construct()
		{
			$this->model = new Entrega;
			$this->modelEntrada = new Entrada;
			$this->user = new User;
			$this->estado = new Estado;
			$this->entrada = new Entrada;
			$this->inventario = new Inventario;
		}

		public function index()
		{
			$controller= 'Entregas';
			if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')|| ($_SESSION['usuario']->rol == 'Representante')){
				require 'views/dashboard.php';
				$entregas = $this->model->getAll();
				require 'views/Entregas/list.php';
				require 'views/footer.php';
			}else {
				header('Location: ?controller=home');
			}

		}

		public function new()
		{
			$controller= 'Entregas';
			$metodo='Nueva Entrega';
			$name='entrega';
			if(isset($_REQUEST['Id_Inventario'])) {
				$Id_Inventario = $_REQUEST['Id_Inventario'];
				$data = $this->inventario->getInventarioById($Id_Inventario);
				$users=$this->user->getAllRepresentante();            
				require 'views/dashboard.php';
				require 'views/Entregas/new.php';
				require 'views/footer.php';
			} else {
				echo "Error";
			}	
		}

		public function save ()
		{
			$dataEntrega=[
				'Fecha'=> $_POST['Fecha'],
				'Total_Material'=> $_POST['Total_Material'],
				'Descripcion_Material'=> $_POST['Descripcion_Material'],
				'Id_Usuario'=> $_POST['Id_Usuario'],
				'Id_Estado' => 1,
				'Empleado' => $_SESSION['usuario']->Nombre,			
				
			];
        //Datos para la tabla detalle
			$TipoMaterial = $_POST['Id_Tipo_Material'];

			if (!empty($TipoMaterial)) {
				$respEntrega = $this->model->newEntrega($dataEntrega);
            //Ultimo Id_Entrada Registrado para incertarlo en la tabla detalle
				$lastIdEntrega= $this->model->getLastId();
            // inserción a la tabla detalle
				$respDetalleEntrega = $this->model->saveDetalleEntrega($TipoMaterial,$lastIdEntrega[0]->Id_Entrega);
				header('Location: ?controller=entrega');
			}else {
				$respEntrada = false;
				$respDetalleEntrada = false;
			}
			
		}

		public function edit()
		{
			$controller= 'Entregas';
			$metodo='Editar Entrega';
			$name='entrega';
			if(isset($_REQUEST['Id_Entrega'])) {
				$Id_Entrega = $_REQUEST['Id_Entrega'];
				$data = $this->model->getEntregaById($Id_Entrega);
				$users=$this->user->getAll();
				$estados=$this->estado->getAll();            
				require 'views/dashboard.php';
				require 'views/Entregas/edit.php';
				require 'views/footer.php';
			} else {
				echo "Error";
			}
		}

		// Realiza el proceso de actualizar
		public function update()
		{
			if(isset($_POST)) {
				$this->model->editEntrega($_POST);			
				header('Location: ?controller=entrega');				
			} else {
				echo "Error";
			}
		}
		public function delete()
		{			
			$this->model->deleteEntrega($_REQUEST);		
			header('Location: ?controller=entrega');
		}
		public function updateStatusEntrega()
		{
			$entrega = $this->model->getEntregaById($_REQUEST['Id_Entrega']);
			$data = [];
			if ($entrega[0]->Id_Estado ==1 ) { 
				$data = [
					'Id_Entrega' => $entrega[0]->Id_Entrega,
					'Id_Estado' => 2
				];
			}    
			elseif($entrega[0]->Id_Estado ==2){

				$data = [
					'Id_Entrega' => $entrega[0]->Id_Entrega,
					'Id_Estado' => 1
				];  

			}
			$this->model->editStatusEntrega($data);
			header('location: ?controller=entrega'); 
		}

			public function print()
			{
				$entregas = $this->model->getAll();
				require 'views/Entregas/imprimir.php';
			}
	}	
