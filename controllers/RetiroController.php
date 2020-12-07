<?php  
	/**
	 * 
	 */
	require 'models/Retiro.php';
	require 'models/user.php';

	class RetiroController
	{
		
		private $model;

		public function __construct()
		{
			$this->model = new Retiro;
			$this->usuario = new User;

		}

		public function index()
		{
			$controller= 'Retiros';
			if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')|| ($_SESSION['usuario']->rol == 'Cajero')|| ($_SESSION['usuario']->rol == 'Cliente')){
				if ($_SESSION['usuario']->rol == 'Cliente') {
					$cliente = $_SESSION['usuario']->Id_Usuario;
					require 'views/dashboard.php';
					$retiros = $this->model->getAllCliente($cliente);
					require 'views/Retiros/list.php';
					require 'views/footer.php'; 
				}else{
					require 'views/dashboard.php';
					$retiros = $this->model->getAll();
					require 'views/Retiros/list.php';
					require 'views/footer.php';
				}
				
			}else {
				header('Location: ?controller=Retiro');
			}

		}

		public function add() //agrega
		{
			$controller= 'Retiros';
			$metodo= 'Nuevo Retiro';
			$name='retiro';
			require 'views/dashboard.php';
			$usuarios=$this->usuario->getAllCliente();
			require 'views/Retiros/new.php';
			require 'views/footer.php';
		}

		public function save()
		{
			$dataRetiro=[
				'Fecha'=> $_POST['Fecha'],
				'Cantidad_Puntos_de_Retiro'=> $_POST['Cantidad_Puntos_de_Retiro'],
				'Id_Usuario'=> $_POST['Id_Usuario'],

			];
			$this->model->newRetiro($dataRetiro);
			header('Location: ?controller=Retiro');
		}

		public function edit() //edita
		{
			$controller= 'Retiros';
			$metodo= 'Nuevo Retiro';
			$name='retiro';
			if (isset($_REQUEST['Id_Retiro'])) {
				$Id_Retiro = $_REQUEST['Id_Retiro'];
				$data = $this->model->getRetiroById($Id_Retiro);
				$usuarios=$this->usuario->getAllCliente();
				require 'views/dashboard.php';
				require 'views/Retiros/edit.php';
				require 'views/footer.php';
			} else{
				echo "Error";
			}
		}

		public function update() //actualiza
		{
			if(isset($_POST)){
				$this->model->editRetiro($_POST);
				header('Location: ?controller=Retiro');	
			}else{
				echo "Error";
			}
			
		}

		public function delete() //elimina
		{
			$this->model->deleteRetiro($_REQUEST);
			header('Location: ?controller=Retiro');	
		}
	}