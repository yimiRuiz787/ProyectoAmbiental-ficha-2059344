<?php
require 'models/EmpresaReciclaje.php';
/**
 * 
 */
class EmpresaReciclajeController
{
    private $model;
    
    public function __construct()
    {     
     $this->model= new EmpresaReciclaje;       
    }

    public function index()
    {
        $controller= 'Empresas de reciclaje';
        if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')){
                require 'views/dashboard.php';
            $EmpresaReciclajes=$this->model->getAll();
            require 'views/scripts.php';
            require 'views/EmpresaReciclaje/list.php';
            require 'views/footer.php';
        }else {
            header('Location: ?controller=home');
        }
            
    }

    public function new()
    {
        $controller= 'Empresas de reciclaje ';
        $metodo='Nueva Empresa de reciclaje';
        $name='empresaReciclaje';
        require 'views/dashboard.php';
        require 'views/scripts.php';
        require 'views/EmpresaReciclaje/new.php';
        require 'views/footer.php';
    }
    public function save()
    {
        $dataEmpresa=[
            'Nit_Empresa'=> $_POST['Nit_Empresa'],
            'Nombre_Empresa'=> $_POST['Nombre_Empresa'],
            'Telefono'=> $_POST['Telefono'],
            'Direccion'=> $_POST['Direccion'],
            
        ];
        $Nit_Empresa = $_POST['Nit_Empresa']; 
        $duplicidad=$this->model->duplicado($Nit_Empresa);

        if ($duplicidad == 1) {
            
            echo 2 ; 
        }else{
            
            echo 1 ;
            $datos=$this->model->newEmpresaReciclaje($dataEmpresa);
        }

               
    }
    public function edit()
    {
        $controller= 'Empresas de reciclaje ';
        $metodo='Editar Empresa de reciclaje';
        $name='empresaReciclaje';
        if(isset($_REQUEST['Id_Empresa_Reciclaje'])){
            $Id_Empresa_Reciclaje = $_REQUEST['Id_Empresa_Reciclaje'];
            $data=$this->model->getEmpresaById($Id_Empresa_Reciclaje );
            require 'views/dashboard.php';
            require 'views/EmpresaReciclaje/edit.php';
            require 'views/footer.php';

        }else{
            echo "Error, no se realizo.";
        }
    }
    public function update()
    {
        if(isset($_POST)){
            $this->model->editEmpresaReciclaje($_POST);
            header('Location: ?controller=EmpresaReciclaje');
        }else{
            echo "Error, no se realizo";
        }
    }
    public function delete()
    {
        $this->model->deleteEmpresaReciclaje($_REQUEST);
        header('Location: ?controller=EmpresaReciclaje');
    }

}

