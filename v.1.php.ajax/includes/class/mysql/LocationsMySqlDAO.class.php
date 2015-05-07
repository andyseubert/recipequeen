<?php
/**
 * Class that operate on table 'locations'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-04-19 17:03
 */
class LocationsMySqlDAO implements LocationsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return LocationsMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM locations WHERE location_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM locations';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM locations ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param location primary key
 	 */
	public function delete($location_id){
		$sql = 'DELETE FROM locations WHERE location_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($location_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param LocationsMySql location
 	 */
	public function insert($location){
		$sql = 'INSERT INTO locations (location_name, location_description) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($location->locationName);
		$sqlQuery->set($location->locationDescription);

		$id = $this->executeInsert($sqlQuery);	
		$location->locationId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param LocationsMySql location
 	 */
	public function update($location){
		$sql = 'UPDATE locations SET location_name = ?, location_description = ? WHERE location_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($location->locationName);
		$sqlQuery->set($location->locationDescription);

		$sqlQuery->setNumber($location->locationId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM locations';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByLocationName($value){
		$sql = 'SELECT * FROM locations WHERE location_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLocationDescription($value){
		$sql = 'SELECT * FROM locations WHERE location_description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByLocationName($value){
		$sql = 'DELETE FROM locations WHERE location_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLocationDescription($value){
		$sql = 'DELETE FROM locations WHERE location_description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return LocationsMySql 
	 */
	protected function readRow($row){
		$location = new Location();
		
		$location->locationId = $row['location_id'];
		$location->locationName = $row['location_name'];
		$location->locationDescription = $row['location_description'];

		return $location;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return LocationsMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>