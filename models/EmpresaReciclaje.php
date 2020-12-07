<?php

/**
 * modelo del estado
 */
class EmpresaReciclaje
{
    private $Id_Empresa_Reciclaje;
    private $Nit_Empresa;
    private $Nombre_Empresa;
    private $Telefono;
    private $Direccion;
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
            
            $strSql = 'SELECT * FROM empresa_reciclaje';
            $query = $this->pdo->select($strSql);
            return $query;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function newEmpresaReciclaje($data)
    {
        try {
            
            $this->pdo->insert('empresa_reciclaje', $data);
            
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function duplicado($Nit_Empresa)
    {
        try{
            $strSql="SELECT * FROM empresa_reciclaje WHERE Nit_Empresa= :Nit_Empresa"; 
            $arrayData=['Nit_Empresa'=>$Nit_Empresa];
            $query=$this->pdo->select($strSql,$arrayData);
            if(!empty($query)){ 
                return 1;
            }                 
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function editEmpresaReciclaje($data)
    {
        try {
            $strWhere= 'Id_Empresa_Reciclaje='.$data['Id_Empresa_Reciclaje'];
            $this->pdo->update('empresa_reciclaje',$data,$strWhere);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
    public function deleteEmpresaReciclaje($data)
    {
        try{
            $strWhere='Id_Empresa_Reciclaje='.$data['Id_Empresa_Reciclaje'];
            $this->pdo->delete('empresa_reciclaje',$strWhere);
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function getEmpresaById($Id_Empresa_Reciclaje)
    {
        try{
            $strSql="SELECT * FROM empresa_reciclaje WHERE Id_Empresa_Reciclaje= :Id_Empresa_Reciclaje";
            $arrayData=['Id_Empresa_Reciclaje'=>$Id_Empresa_Reciclaje ];
            $query=$this->pdo->select($strSql,$arrayData);
            return $query;
        }catch(PDOException $e){
            die($e->getMessage());      
        }
    }
}
