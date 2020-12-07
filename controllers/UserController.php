<?php
require 'models/User.php';
require 'models/Rol.php';
require 'models/Estado.php';
require 'models/EmpresaReciclaje.php';

/**
 * 
 */ 
class UserController
{
    private $model;
    private $rol;
    private $empresa;

    public function __construct()
    {
        $this->model=new User;
        $this->rol = new Role;
        $this->estado = new Estado;
        $this->empresa = new EmpresaReciclaje;

    }

    public function index()
    {
        $controller= 'Usuarios';
        $name='user';
        if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')){
            require 'views/dashboard.php';
            $users=$this->model->getAll();
            require 'views/scripts.php';
            require 'views/user/list.php';
            require 'views/footer.php';
        }else {
            header('Location: ?controller=home');
        }

    }

    public function indexRepresentante()
    {
        $controller= 'Usuarios';
        $name='user';
        if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')){
            require 'views/dashboard.php';
            $users=$this->model->getAllRepresentante();
            require 'views/scripts.php';
            require 'views/user/listRepresentante.php';
            require 'views/footer.php';
        }else {
            header('Location: ?controller=home');
        }

    }    
		public function indexCliente()
		{
			$controller= 'Usuarios';
            $name='Usuarios';
			if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')){
				require 'views/dashboard.php';
                $users=$this->model->getAllCliente();
                require 'views/scripts.php';
				require 'views/user/listCliente.php';
				require 'views/footer.php';
			}else {
				header('Location: ?controller=home');
			}

        }
        public function indexClientes()
		{
			$controller= 'Usuarios';
            $name='Usuarios';
			if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')){
				require 'views/dashboard.php';
                $users=$this->model->getAllClientes();
                require 'views/scripts.php';
				require 'views/user/listCliente.php';
				require 'views/footer.php';
			}else {
				header('Location: ?controller=home');
			}

		}

        public function updateDatos()
        {
            if(isset($_POST)){
                $this->model->editUser($_POST);
                header('Location: ?controller=home');
            }else{
                echo "Error, no se realizo";
            }
        }

    

    public function new()
    {
        $controller= 'Usuarios';
        $name='user';
        require 'views/dashboard.php';
        $roles=$this->rol->getAll();
        $empresas=$this->empresa->getAll();
        require 'views/scripts.php';
        require 'views/user/new.php';
        require 'views/footer.php';
    }
    public function save()
    { 

        $dataUsuario=[
            'Nombre'=> $_POST['Nombre'],
            'Apellido'=> $_POST['Apellido'],
            'Cedula'=> $_POST['Cedula'],
            'Correo'=> $_POST['Correo'],
            'Telefono'=> $_POST['Telefono'],
            'Direccion'=> $_POST['Direccion'],
            'foto'=> $_FILES['foto'],
            'Id_Rol'=> $_POST['Id_Rol'],
            'Id_Empresa_Reciclaje'=> $_POST['Id_Empresa_Reciclaje'],
        ];
    
        
        $Correo = $dataUsuario['Correo']; 
        $Cedula = $dataUsuario['Cedula']; 
        $correoD=$this->model->correo($Correo);
        $cedulaD=$this->model->cedula($Cedula);
        if ($correoD == 1) {
            echo 2 ; 

        }elseif ($cedulaD == 1) {
            echo 3;
        }
        else{
            echo 1 ;
            $datos = $this->model->newUser($dataUsuario);
        }
       
    }
    public function edit()
    {
        $controller= 'Usuarios';
        $name='user';
        if(isset($_REQUEST['Id_Usuario'])){
            $Id_Usuario = $_REQUEST['Id_Usuario'];
            $data=$this->model->getUserById($Id_Usuario );
            $roles=$this->rol->getAll();
            $empresas=$this->empresa->getAll();
            require 'views/dashboard.php';
            require 'views/user/edit.php';
            require 'views/footer.php';
        }else{
            echo "Error, no se realizo.";
        }
    }
    public function update()
    {
        if(isset($_POST)){ 
            $this->model->editUser($_POST);
            //header('Location: ?controller=User');
        }else{ 
            echo "Error, no se realizo";
        }
    }
    
    public function delete()
    {
        $this->model->deleteUser($_REQUEST);
        header('Location: ?controller=User');
    }

    public function updateStatusUser()
    {
       $user = $this->model->getUserById($_REQUEST['Id_Usuario']);
       $data = [];
       if ($user[0]->Id_Estado ==1 ) { 
           $data = [
            'Id_Usuario' => $user[0]->Id_Usuario,
            'Id_Estado' => 2
        ];
        }    
        elseif($user[0]->Id_Estado ==2){

            $data = [
                'Id_Usuario' => $user[0]->Id_Usuario,
                'Id_Estado' => 1
            ];  

        }
        $this->model->editStatusUser($data);
        header('location: ?controller=User'); 
    }
    public function create(){
        $nombre = $_POST['nombre'];
        $enviar = $this->model->sendemail();
        $usuario = [$_POST['nombre'],$_POST['apellido'],$_POST['cedula'],$_POST['correo'],$_POST['telefono'],$_POST['direccion'],$enviar];
        $registrar = $this->model->Registrar($usuario);
        $correo = $_POST['correo'];
        header('Location: ?controller=login');
    }

    public function show()
    {
        require'views/resetpassword.php';
    }
    public function resetpassword()
    {
        $clave_antigua=$_SESSION['usuario']->Clave;
        $usuclave = $_POST['claveactual'];
        $clavenueva = $_POST['clavenueva'];
        if ($clave_antigua == $usuclave) {
            $this->model->updatepassword($clavenueva);
            header('Location: ?controller=login&method=logout');
        }else{
            echo "La contraseña no coincide";
        }
    }
}


?>