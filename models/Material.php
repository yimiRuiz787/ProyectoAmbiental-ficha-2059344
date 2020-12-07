<?php 
	/**
	 * 
	 */
	class Material
	{

		private $Id_Material;
		private $Nombre_Material;
		private $Descripcion;
		
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
				$strSql = "SELECT * FROM material";
				$query = $this->pdo->select($strSql);
				return $query;

			} catch(PDOException $e){
				die($e->getMessage());
			}
		}

		public function newMaterial($data)
		{
			try{
				$this->pdo->insert('material',$data);
			} catch(PDOException $e){
				die($e->getMessage());
			}
		}

		public function getMaterialById($Id_Material)
		{
			try{

				$strSql = 'SELECT * FROM material WHERE Id_Material = :Id_Material'; 
				$array = ['Id_Material' => $Id_Material];
				$query = $this->pdo->select($strSql, $array);
				return  $query;

			} catch(PDOException $e){
				die($e->getMessage());
			}
		}

		public function editMaterial($data)
		{
			try {
				$strWhere = 'Id_Material=' . $data['Id_Material'];
				$this->pdo->update('material', $data, $strWhere);
			} catch (PDOException $e) {
				die($e->getMessage());
			}
		}

		public function deleteMaterial($data)
		{
			try{
				$strWhere = 'Id_Material = ' .$data['Id_Material'];
				$this->pdo->delete('material', $strWhere);

			} catch(PDOException $e){
				die($e->getMessage());
			}
		}

	}