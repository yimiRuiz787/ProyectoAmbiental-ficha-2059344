<?php
require 'Models/Rol.php';
 
class RolController{
    private $model;
    
    public function __construct()
    {
        $this->model = new Role;
    }

   

    public function index()
    {
        $controller= 'Roles';
        if (isset($_SESSION['usuario']) && ($_SESSION['usuario']->rol == 'Gerente')){
            require 'views/dashboard.php';
            $roles = $this->model->getAll();
            require 'views/Rol/list.php';
            require 'views/footer.php';
            }else {
            header('Location: ?controller=home');
        }
                
    }
}
  