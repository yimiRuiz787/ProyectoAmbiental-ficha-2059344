<?php
	/**
	 * Clase de Conexión y estandar de control de la Crud.
	 */
	class Database extends PDO
	{	
		private $driver = 'mysql';
		private $host = 'localhost';	
		private $dbName = 'LuzDary';
		private $charset = 'utf8';
		private $user = 'root';
		private $password = '';

		// sobre carga al constructor con cadena de conexión a la BD.
		public function __construct()
		{
			try {
				parent::__construct("{$this->driver}:host={$this->host}; dbname={$this->dbName}; charset={$this->charset}", $this->user, $this->password);
				$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch(PDOException $e) {
				echo "Conexión Fallida {$e->getMessage()}";
			}
		}

		// Metodos de la clase para hacer una Crud
		public function select($strSql, $arrayData = array(), $fetchMode = PDO::FETCH_OBJ)
		{
			//prepara el query
			$query = $this->prepare($strSql);

			//asigna parametros al query si llegan como un array
			foreach ($arrayData as $key => $value) {
				$query->bindParam(":$key", $value);
			}

			//valida si se ejecuta o no el query
			if(!$query->execute()) {
				echo "Error, la Consulta no se Realizó";
			} else {
				//devuelve el objeto del query
				return $query->fetchAll($fetchMode);
			}
		}

		public function insert($table, $data)
		{
			try{
				//metodo que ordena el array de datos
				ksort($data);
				//Eliminar del array los indices de controller y method
				unset($data['controller'], $data['method']);

				$fieldNames = implode('`, `', array_keys($data));
				$fieldValues = ':' . implode(', :', array_keys($data));
				$strSql = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");

				foreach ($data as $key => $value) {
					$strSql->bindValue(":$key", $value);

				}
				$strSql->execute();

			} catch(PDOException $e){
				die($e->getMessage());
			}
		}

		public function update($table, $data, $where)
		{
			try {
				//metodo que ordenar el array de datos
				ksort($data);
				
				$fieldDetails = null;

				foreach ($data as $key => $value) {
					$fieldDetails .= "`$key` =:$key,";					
				}

				$fieldDetails = rtrim($fieldDetails, ',');

				$strSql = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");

				foreach ($data as $key => $value) {
					$strSql->bindValue(":$key", $value);
				}

				$strSql->execute();
			} catch(PDOException $e) {
				die($e->getMessage());
			}		
		}
		public function recuperar($table, $data, $where)
		{
			try {
				//metodo que ordenar el array de datos
				//ksort($data);
				
				$fieldDetails = null;

				foreach ($data as $key => $value) {
					$fieldDetails .= "`$key` =:$key,";					
				}

				$fieldDetails = rtrim($fieldDetails, ',');

				$strSql = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");

				foreach ($data as $key => $value) {
					$strSql->bindValue(":$key", $value);
				}

				$strSql->execute();
			} catch(PDOException $e) {
				die($e->getMessage());
			}		
		}

		public function delete($table, $where)
		{
			return $this->exec("DELETE FROM $table WHERE $where ");
		}
	}