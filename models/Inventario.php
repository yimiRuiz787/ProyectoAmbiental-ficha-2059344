<?php 
	/**
	 * 
	 */
	class Inventario
	{

		private $Id_Inventario;
		private $Id_Tipo_Material;
		private $Cantidad;
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
			try{
				$strSql = "SELECT i.*, tm.Nombre_Tipo_Material as Nombre_Tipo FROM inventario i INNER JOIN  tipo_material tm ON tm.Id_Tipo=i.Id_Tipo_Material";
				$query = $this->pdo->select($strSql);
				return $query;

			} catch(PDOException $e){
				die($e->getMessage());
			}
		}	

		public function getInventarioById($Id_Inventario)
		{
			try {
				$strSql = "SELECT * FROM inventario WHERE Id_Inventario = :Id_Inventario";
				$arrayData = ['Id_Inventario' => $Id_Inventario];
				$query = $this->pdo->select($strSql, $arrayData);
				return $query; 
			} catch(PDOException $e) {
				die($e->getMessage());
			}	
		}
	}