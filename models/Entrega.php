<?php
	/**
	 * modelo de la tabla entrega
	 */
	class Entrega
	{


		private $Id_Entrega;
		private $Fecha;
		private $Total_Material;
		private $Descripcion_Material;
		private $Id_Usuario;
		private $Id_Estado;
		private $Empleado;
		private $pdo;
		
		public function __construct()
		{
			try {
				$this->pdo = new Database;
			} catch(PDOExecption $e){
				die($e->getMessage());
			}
		}
		public function getAll()
		{
			try {
				$strSql = "SELECT eg.*, es.Nombre as estado, us.Nombre as usuario FROM entrega eg INNER JOIN estado es INNER JOIN usuario us ON  eg.Id_Estado=es.Id_Estado AND us.Id_Usuario=eg.Id_Usuario ORDER BY eg.Id_Entrega ASC";
				$query = $this->pdo->select($strSql);
				return $query;
			} catch(PDOExecption $e){
				die($e->getMessage());
			}
		}

		public function newEntrega($dataEntrega)
		{
			try {
				
				$this->pdo->insert('entrega',$dataEntrega);
			} catch(PDOExecption $e){
				die($e->getMessage());
			}
		}

		public function getLastId()
		{
			try {
				$strSql = "SELECT MAX(Id_Entrega) as Id_Entrega FROM entrega";
				$query = $this->pdo->select($strSql);
				return $query; 
			} catch(PDOException $e) {
				return($e->getMessage());
			}	
		}

		public function saveDetalleEntrega($TipoMaterial, $lastIdEntrega)
		{			
			try {				
				
				$data = [
					'Id_Entrega' => $lastIdEntrega,
					'Id_Tipo_Material' =>$TipoMaterial,
				];
				$this->pdo->insert('detalle_entrega',$data);

			} catch(PDOExecption $e){
				return($e->getMessage());
			}
		}

		public function getEntregaById($Id_Entrega)
		{
			try {
				$strSql = "SELECT * FROM entrega WHERE Id_Entrega = :Id_Entrega";
				$arrayData = ['Id_Entrega' => $Id_Entrega];
				$query = $this->pdo->select($strSql, $arrayData);
				return $query; 
			} catch(PDOException $e) {
				die($e->getMessage());
			}	
		}


		public function editEntrega($data)
		{
			try {
				$strWhere = 'Id_Entrega = '. $data['Id_Entrega'];
				$this->pdo->update('entrega', $data, $strWhere);				
			} catch(PDOException $e) {
				die($e->getMessage());
			}		
		}
		public function deleteEntrega($data)
		{
			try {
				$strWhere = 'Id_Entrega = '. $data['Id_Entrega'];
				$this->pdo->delete('entrega', $strWhere);
			} catch(PDOException $e) {
				die($e->getMessage());
			}	
		}
		public function editStatusEntrega($data)
		{
			try {   
				$strWhere = 'Id_Entrega ='. $data['Id_Entrega'];
				$this->pdo->update('entrega', $data, $strWhere);              
			} catch(PDOException $e) {
				die($e->getMessage());
			}       
		}
	}	