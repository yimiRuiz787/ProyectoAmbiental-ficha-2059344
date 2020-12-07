<?php
	/**
	 * modelo de la tabla entrada
	 */
	class Entrada
	{


		private $Id_Entrada;
		private $Fecha;
		private $Puntos;
		private $Peso_Material;
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
				$strSql = "SELECT ed.*, es.Nombre as estado, u.Nombre as usuario FROM entrada ed INNER JOIN estado es INNER JOIN usuario u  ON  es.Id_Estado=ed.Id_Estado AND ed.Id_Usuario=u.Id_Usuario   ORDER BY ed.Id_Entrada ASC";
				$query = $this->pdo->select($strSql);
				return $query;
			} catch(PDOExecption $e){
				die($e->getMessage());
			}
		}

		public function getAllCliente($cliente)
		{
			try {
				$strSql = "SELECT ed.*, es.Nombre as estado, u.Nombre as usuario FROM entrada ed INNER JOIN estado es INNER JOIN usuario u ON es.Id_Estado=ed.Id_Estado AND ed.Id_Usuario=u.Id_Usuario WHERE u.Id_Usuario = '{$cliente}' ORDER BY ed.Id_Entrada ASC";
				$query = $this->pdo->select($strSql);
				return $query;
			} catch(PDOExecption $e){
				die($e->getMessage());
			}
		}



		/*public function newDetalle_Entrada($data)
		{
			
			try {
				if (isset($data['Id_Tipo_Material'])) {

					$data['Id_Tipo_Material'] = $_REQUEST['Id_Tipo_Material'];
					$this->pdo->insert('detalle_entrada',$data);
				}
			} catch (PDOExecption $e) {
				die($e->getMessage());
			}
		}
		*/
		public function newEntrada($dataEntrada)
		{
			
			try {				
				$this->pdo->insert('entrada',$dataEntrada);
				return true;
			} catch(PDOExecption $e){
				return($e->getMessage());
			}
		}

		public function getLastId()
		{
			try {
				$strSql = "SELECT MAX(Id_Entrada) as Id_Entrada FROM entrada";
				$query = $this->pdo->select($strSql);
				return $query; 
			} catch(PDOException $e) {
				return($e->getMessage());
			}	
		}

		public function saveDetalleEntrada($arrayTipoMaterial, $lastIdEntrada)
		{			
			try {				
				
				$data = [
					'Id_Entrada' => $lastIdEntrada,
					'Id_Tipo_Material' =>$arrayTipoMaterial,
				];
				$this->pdo->insert('detalle_entrada',$data);

			} catch(PDOExecption $e){
				return($e->getMessage());
			}
		}

		public function updateInventario($arrayTipoMaterial,$Peso_Material)
		{
			try {

				$strSql = "SELECT Id_Inventario FROM inventario WHERE Id_Tipo_Material = '{$dataInventario['Id_Tipo_Material']}'";
				$data = [
					'Id_Inventario' => 1,					
					'Id_Tipo_Material' =>$arrayTipoMaterial,
					'Cantidad' => $Peso_Material,
				];

				$strWhere = 'Id_Inventario=' . $data['Id_Inventario'];
				$this->pdo->update('inventario', $data, $strWhere);
			} catch (PDOException $e) {
				die($e->getMessage());
			}
		}


		public function getTipoMaterialesEntrada($Id_Entrada)
		{
			try {
				$strSql = "SELECT de.*, tm.Nombre_Tipo_Material as tipoMaterial FROM detalle_entrada de INNER JOIN tipo_material tm on tm.Id_Tipo=de.Id_Tipo_Material WHERE de.Id_Entrada = '{$Id_Entrada}'";
				$query = $this->pdo->select($strSql);
				return $query; 
			} catch(PDOException $e) {
				return($e->getMessage());
			}	
		}

		public function deleteTipoMaterial($Id_Entrada)
		{
			try {
				$strWhere = 'Id_Entrada = '. $Id_Entrada;
				$this->pdo->delete('detalle_entrada', $strWhere);
			} catch(PDOException $e) {
				die($e->getMessage());
			}	
		}
		public function getEntradaById($Id_Entrada)
		{
			try {
				$strSql = "SELECT * FROM entrada WHERE Id_Entrada = :Id_Entrada";
				$arrayData = ['Id_Entrada' => $Id_Entrada];
				$query = $this->pdo->select($strSql, $arrayData);
				return $query; 
			} catch(PDOException $e) {
				die($e->getMessage());
			}	
		}

		public function editEntrada($data)
		{
			try {
				$strWhere = 'Id_Entrada = '. $data['Id_Entrada'];
				$this->pdo->update('entrada', $data, $strWhere);				
			} catch(PDOException $e) {
				die($e->getMessage());
			}		
		}
		public function deleteEntrada($data)
		{
			try {
				$strWhere = 'Id_Entrada = '. $data['Id_Entrada'];
				$this->pdo->delete('entrada', $strWhere);
			} catch(PDOException $e) {
				die($e->getMessage());
			}	
		}
		public function editStatusEntrada($data)
		{
			try {   
				$strWhere = 'Id_Entrada ='. $data['Id_Entrada'];
				$this->pdo->update('entrada', $data, $strWhere);              
			} catch(PDOException $e) {
				die($e->getMessage());
			}       
		}
	}	