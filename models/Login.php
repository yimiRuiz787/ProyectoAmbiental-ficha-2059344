<?php

/**
 * 
 */
	class Login
	{
		
		private $pdo;

		public function __construct()
		{
			try{
				$this->pdo =new Database;
			}catch (PDOException $e){
				die($e->getMessage());
			}
		}

		public function validateUser($data)
        {
            try {
            $strSql = "SELECT u.*, r.Nombre as rol FROM usuario u INNER JOIN rol r ON r.Id_Rol = u.Id_Rol WHERE u.Correo = '{$data['Correo']}' AND u.Clave = '{$data['Clave']}'";
            
            
            $query = $this->pdo->select($strSql);

            if(isset($query[0]->Id_Usuario)) {
                $_SESSION['usuario'] = $query[0];
                return true;
            } else
                return 'Error al Iniciar Sesión. Verifique sus Credenciales';
            } catch (PDOException $e) {
                return $e->getMessage();
            }
        }
	}