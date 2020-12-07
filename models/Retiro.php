<?php
	
	/**
	 * Modelo de la Tabla Retiro
	 */
	class Retiro
	{
		private $Id_Retiro;
		private $Fecha;
		private $Cantidad_Puntos_de_Retiro;
		private $Id_Usuario;
		private $pdo;
		
		public function __construct()
		{
			try {
				$this->pdo = new Database;
			} catch(PDOException $e) {
				die($e->getMessage());
			}
		}

		public function getAll()
		{
			try {
				$strSql = "SELECT r.*,u.Nombre as usuario FROM retiro r INNER JOIN usuario u ON r.Id_Usuario=u.Id_Usuario  ORDER BY r.Id_Retiro ASC";
				//Llamado al metodo general que ejecuta un select a la BD
				$query = $this->pdo->select($strSql);
				//retorna el objeto del query
				return $query;
			} catch(PDOException $e) {
				die($e->getMessage());
			}
		}
		public function getAllCliente($cliente)
		{
			try {
				$strSql = "SELECT r.*,u.Nombre as usuario FROM retiro r INNER JOIN usuario u ON r.Id_Usuario=u.Id_Usuario WHERE u.Id_Usuario = '{$cliente}'  ORDER BY r.Id_Retiro ASC";
				//Llamado al metodo general que ejecuta un select a la BD
				$query = $this->pdo->select($strSql);
				//retorna el objeto del query
				return $query;
			} catch(PDOException $e) {
				die($e->getMessage());
			}
		}

		public function newRetiro($data)
		{
			try {
				
				$this->pdo->insert('retiro', $data);				
			} catch(PDOException $e) {
				die($e->getMessage());
			}	
		}

		public function getRetiroById($Id_Retiro)
		{
			try {
				$strSql = "SELECT * FROM retiro WHERE Id_Retiro = :Id_Retiro";
				$arrayData = ['Id_Retiro' => $Id_Retiro];
				$query = $this->pdo->select($strSql, $arrayData);
				return $query; 
			} catch(PDOException $e) {
				die($e->getMessage());
			}	
		}

		public function editRetiro($data)
		{ 
			try {
				$strWhere = 'Id_Retiro = '. $data['Id_Retiro'];
				$this->pdo->update('retiro', $data, $strWhere);				
			} catch(PDOException $e) {
				die($e->getMessage());
			}		
		}

		public function deleteRetiro($data)
		{
			try {
				$strWhere = 'Id_Retiro = '. $data['Id_Retiro'];
				$this->pdo->delete('retiro', $strWhere);
			} catch(PDOException $e) {
				die($e->getMessage());
			}	
		}
	}