<?php
require 'models/Registrar.php';
require 'models/Rol.php';

/**
 * 
 */
class RegistrarController
{
    private $model;
    private $rol;

    public function __construct()
    {
        $this->model=new Registrar;
        $this->rol = new Role;
    }

    public function index()
        {
            require'views/registrar.php';
        }

    public function new()
    {
        $controller= 'Usuarios';
        $metodo= 'Nuevo Usuarios';
        $name='user';
        $roles=$this->rol->getAll();
        require 'views/registrar.php';
    }
    public function save()
    {
        $this->model->newUser($_REQUEST);
        header('Location: ?controller=home');
    }

    public function politicas()
    {
       require 'views/politicas.php';
     }
    
}
?>