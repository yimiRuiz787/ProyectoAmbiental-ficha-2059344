<?php

/**
 * Modelo de Estado
 */
class Estado
{
	private $Id_Estado;
	private $Nombre;
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
			$strSql = "SELECT * FROM estado";
			$query = $this->pdo->select($strSql);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function newEstado($data)
	{
		try {				
			
			$this->pdo->insert('estado',$data);
		} catch(PDOExecption $e){
			die($e->getMessage());
		}
	}
	public function editEntrada($data)
	{
		try {
			$strWhere = 'Id_Estado = '. $data['Id_Estado'];
			$this->pdo->update('estado', $data, $strWhere);				
		} catch(PDOException $e) {
			die($e->getMessage());
		}		
	}
	public function deleteEntrada($data)
	{
		try {
			$strWhere = 'Id_Estado = '. $data['Id_Estado'];
			$this->pdo->delete('estado', $strWhere);
		} catch(PDOException $e) {
			die($e->getMessage());
		}	
	}
	
	public function getById($Id_Estado)
	{
		try {
			$strsql="SELECT * FROM estado WHERE Id_Estado= :Id_Estado";
			$array =['Id_Estado'=>$Id_Estado];
			$query=$this->pdo->select($strsql,$array);
			return $query;
		} catch (PDOException $e) {
			die($e->getMessage());
		}
	}

}