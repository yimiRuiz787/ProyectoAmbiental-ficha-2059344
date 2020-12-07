<?php

/**
 * modelo del usuario registrar
 */
class Registrar
{
    private $Id_Usuario;
    private $Nombre;
    private $Apellido;
    private $Cedula;
    private $Correo;
    private $Telefono;
    private $Direccion;
    private $Clave;
    private $Id_Rol;
    private $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new Database;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getAll()
    {
        try {
            $strSql = 'SELECT m.*, u.Nombre as rol  FROM usuario m INNER JOIN rol u  ON  u.Id_Rol=m.Id_Rol';
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function newUser($data)
    {
        try {
            $data['Id_Rol'] = 3;
            $this->pdo->insert('usuario', $data);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function getUserById($Id_Usuario)
    {
        try{
            $strSql="SELECT * FROM usuario WHERE Id_Usuario= :Id_Usuario";
            $arrayData=['Id_Usuario'=>$Id_Usuario];
            $query=$this->pdo->select($strSql,$arrayData);
            return $query;
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }
}
 