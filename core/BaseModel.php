<?php
/**
 * Created by PhpStorm.
 * User: ale
 * Date: 8/11/18
 * Time: 18:53
 */

require_once 'core/Connection.php';

class BaseModel {

	private $table;

	public function __construct($table) {
		$this->table = (string) $table;
	}

	// METODOS
	public function getConnection() {
		$this->connection = Connection::getInstance(); //Singleton
		return $this->connection;
	}

	//
	public function check_queryPDO($sql): bool{
		$connection = self::getConnection()->connection_PDO()->query($sql)
		or die("**Error de consulta en la base de datos.");
		//
		if (is_object($connection)) {
			return ($connection->fetch(PDO::FETCH_NUM) > 0); //TRUE OR FALSE
		} /*else {
	      return ($connection->PDOStatement::rowCount > 0);
*/
	}

	public function getObject($sql) {
		$connection = self::getConnection()->connection_PDO();
		$query = $connection->prepare($sql);
		$query->execute();
		//
		$resultSet = [];
		while ($row = $query->fetch(PDO::FETCH_OBJ)) {
			$resultSet[] = $row;
		}
		//
		return $resultSet;
	}

	public function getAll() {
		//echo 'Estoy en getAll';
		$sql = "SELECT * FROM $this->table";
		if (self::check_queryPDO($sql)) {
			return self::getObject($sql);
		} else {
			return ("**Error de consulta en la base de datos.");
		}
	}

	public function getAllById($nomFieldId, $id) {
		$sql = "SELECT * FROM $this->table WHERE $nomFieldId=$id";
		if (self::check_queryPDO($sql)) {
			return self::getObject($sql);
		} else {
			return false;
		}

	}

	public function doQuery($sql, $params) {
		$connection = self::getConnection()->connection_PDO();
		$prepare = $connection->prepare($sql);
		$response = $prepare->execute($params);
		return $response;
	}

}