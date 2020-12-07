<?php
/*Error actualizando el detalle de entrada*/
require 'models/Entrada.php';
require 'models/Estado.php';
require 'models/User.php';

require 'models/TipoMaterial.php';
require 'models/Inventario.php';

class EntradaController
{
    private $model;
    private $estado;
    private $usuario;
    private $cliente;
    private $tipoMaterial;
    private $inventario;

    public function __construct()
    {
        $this->model = new Entrada;
        $this->estado = new Estado;
        $this->usuario = new User;
       
        $this->tipoMaterial = new TipoMaterial;
        $this->inventario = new Inventario;
    }


    public function index()
    {
        $controller= 'Entradas';
        $name='entrada';
        if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')|| ($_SESSION['usuario']->rol == 'Cajero')|| ($_SESSION['usuario']->rol == 'Cliente')){
            if ($_SESSION['usuario']->rol == 'Cliente') {
                $cliente = $_SESSION['usuario']->Id_Usuario;
                require 'views/dashboard.php';
                $entradas = $this->model->getAllCliente($cliente);
                require 'views/Entradas/list.php';
                require 'views/footer.php'; 
            }else{
                require 'views/dashboard.php';
                $entradas = $this->model->getAll();
                require 'views/Entradas/list.php';
                require 'views/footer.php';
            }
            
        }else {
            header('Location: ?controller=home');
        }
        
    }

    public function new()
    {
        $controller= 'Entradas';
        $metodo='Nueva Entrada';
        $name='entrada';
        require 'views/dashboard.php';     
        $usuarios=$this->usuario->getAllCliente();
        $usuarioC=$this->usuario->getAllCliente();
        $estados=$this->estado->getAll();
        $tipoMateriales=$this->tipoMaterial->getAll();

        
        require 'views/scripts.php';
        require 'views/Entradas/new.php';
        require 'views/footer.php';
        
    }

    public function save()
    {


        $dataEntrada=[
            'Fecha'=> $_POST['Fecha'],
            'Peso_Material'=> $_POST['Peso_Material'],
            'Id_Usuario'=> $_POST['Id_Usuario'],
            'Empleado'=> $_SESSION['usuario']->Nombre,
            'Puntos'=> $_POST['Puntos'],
            'Id_Estado'=> 1
        ];

        //Datos para la tabla detalle
        $arrayTipoMaterial = $_POST['Id_Tipo'];

        $Peso_Material = $_POST['Peso_Material'];
        

        if (!empty($arrayTipoMaterial)) {
            $respEntrada = $this->model->newEntrada($dataEntrada);
            //Ultimo Id_Entrada Registrado para incertarlo en la tabla detalle
            $lastIdEntrada = $this->model->getLastId();
            // Enviamos el peso del material para actualizar el inventario
            /*$respInventario = $this->model->updateInventario($arrayTipoMaterial,$Peso_Material);*/ 
            // inserción a la tabla detalle
            $respDetalleEntrada = $this->model->saveDetalleEntrada($arrayTipoMaterial,$lastIdEntrada[0]->Id_Entrada);
            header('Location: ?controller=entrada');
        }else {
            $respEntrada = false;
            $respDetalleEntrada = false;
        }
        
        //Validar Inserciones
        $arrayResp=[];

        if ($respEntrada == true && $respDetalleEntrada == true) {
            $arrayResp=[
                'success'=> true,
                'message'=>"Entrada registrada" 
            ];
        }else{
            $arrayResp=[
               'success'=> false,
               'message'=>"Error creando la Entrada" 
           ];
        }

        echo json_encode($arrayResp);
        return;
    }

    public function edit()
    {
        $controller= 'Entradas';
        $metodo='Editar Entrada';
        $name='entrada';
        if (isset($_REQUEST['Id_Entrada'])) {
            $Id_Entrada = $_REQUEST['Id_Entrada'];
            $data       = $this->model->getEntradaById($Id_Entrada);
            $estados=$this->estado->getAll();
            $usuarios=$this->usuario->getAllCliente();
            $tipoMateriales=$this->tipoMaterial->getAll(); 

            $tipoMaterialesEntrada=$this->model->getTipoMaterialesEntrada($Id_Entrada);

            require 'views/dashboard.php';
            require 'views/scripts.php';
            require 'views/Entradas/edit.php';
            require 'views/footer.php';
        } else {
            echo "Error";
        }
    }

    // Realiza el proceso de actualizar
    public function update()
    {
        //Validar Inserciones
        
            $dataEntrada=[
                'Id_Entrada'=> $_POST['Id_Entrada'],
                'Fecha'=> $_POST['Fecha'],
                'Peso_Material'=> $_POST['Peso_Material'],
                'Id_Usuario'=> $_POST['Id_Usuario'],
                'Empleado'=> $_SESSION['usuario']->Nombre,
                'Puntos'=> $_POST['Puntos'],
                'Id_Estado'=> $_POST['Id_Estado']
            ];

            //Datos para la tabla detalle
            $arrayTipoMaterial = $_POST['Id_Tipo'];

            if (!empty($arrayTipoMaterial)) {
                $respEntrada = $this->model->editEntrada($dataEntrada);

                //metodo para eliminar los tipos de material de el detalle
                $this->model->deleteTipoMaterial($_POST['Id_Entrada']);

                $lastIdEntrada= $this->model->getLastId();
                // inserción a la tabla detalle
                $respDetalleEntrada = $this->model->saveDetalleEntrada($lastIdEntrada[0]->Id_Entrada,$arrayTipoMaterial);
                header('Location: ?controller=entrada');
            }else{
                $respEntrada = false;
                $respDetalleEntrada = false;
            }
        
    }
    public function delete()
    {
        $this->model->deleteEntrada($_REQUEST);
        header('Location: ?controller=entrada');
    }
    public function updateStatus()
    {
       $entrada = $this->model->getEntradaById($_REQUEST['Id_Entrada']);
       $data = [];
       if ($entrada[0]->Id_Estado ==1 ) { 
           $data = [
                'Id_Entrada' => $entrada[0]->Id_Entrada,
                'Id_Estado' => 2
            ];
        }elseif($entrada[0]->Id_Estado ==2){

            $data = [
                'Id_Entrada' => $entrada[0]->Id_Entrada,
                'Id_Estado' => 1
            ];  

        }
        $this->model->editStatusEntrada($data);
        header('location: ?controller=entrada'); 
    }
}
