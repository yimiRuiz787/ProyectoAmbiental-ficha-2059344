<?php 
	/**
	 * 
	 */
	class TipoMaterial
	{

		private $Id_Tipo;
		private $Nombre_Tipo_Material;
		private $Puntos;
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
				$strSql = "SELECT t.*, m.Nombre_Material as Nombre_Material FROM tipo_material t INNER JOIN  material m ON m.Id_Material=t.Id_Material";
				$query = $this->pdo->select($strSql);
				return $query;

			} catch(PDOException $e){
				die($e->getMessage());
			}
		}

		public function newTipoMaterial($data)
		{
			try{
				$this->pdo->insert('tipo_material',$data);
			} catch(PDOException $e){
				die($e->getMessage());
			}
		}
		public function getLastId()
		{
			try {
				$strSql = "SELECT MAX(Id_Tipo) as Id_Tipo FROM tipo_material";
				$query = $this->pdo->select($strSql);
				return $query; 
			} catch(PDOException $e) {
				return($e->getMessage());
			}	
		}

		public function saveInventario($lastIdTipo)
		{			
			try {				
				
				$data = [
					'Id_Tipo_Material' => $lastIdTipo,
					'Cantidad' =>0,
				];
				$this->pdo->insert('inventario',$data);

			} catch(PDOExecption $e){
				return($e->getMessage());
			}
		}

		public function getTipoMaterialById($Id_Tipo)
		{
			try{

				$strSql = 'SELECT * FROM tipo_material WHERE Id_Tipo = :Id_Tipo'; 
				$array = ['Id_Tipo' => $Id_Tipo];
				$query = $this->pdo->select($strSql, $array);
				return  $query;

			} catch(PDOException $e){
				die($e->getMessage());
			}
		}

		public function editTipoMaterial($data)
		{
			try {
				$strWhere = 'Id_Tipo=' . $data['Id_Tipo'];
				$this->pdo->update('tipo_material', $data, $strWhere);
			} catch (PDOException $e) {
				die($e->getMessage());
			}
		}

		public function deleteTipoMaterial($data)
		{
			try{
				$strWhere = 'Id_Tipo = ' .$data['Id_Tipo'];
				$this->pdo->delete('tipo_material', $strWhere);

			} catch(PDOException $e){
				die($e->getMessage());
			}
		}
	}