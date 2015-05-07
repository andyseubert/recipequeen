<?php
/**
 * Class that operate on table 'process'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-04-19 17:03
 */
class ProcessMySqlDAO implements ProcessDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ProcessMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM process WHERE process_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM process';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM process ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param proces primary key
 	 */
	public function delete($process_id){
		$sql = 'DELETE FROM process WHERE process_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($process_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ProcessMySql proces
 	 */
	public function insert($proces){
		$sql = 'INSERT INTO process (process_name, process_description) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($proces->processName);
		$sqlQuery->set($proces->processDescription);

		$id = $this->executeInsert($sqlQuery);	
		$proces->processId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ProcessMySql proces
 	 */
	public function update($proces){
		$sql = 'UPDATE process SET process_name = ?, process_description = ? WHERE process_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($proces->processName);
		$sqlQuery->set($proces->processDescription);

		$sqlQuery->setNumber($proces->processId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM process';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByProcessName($value){
		$sql = 'SELECT * FROM process WHERE process_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByProcessDescription($value){
		$sql = 'SELECT * FROM process WHERE process_description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByProcessName($value){
		$sql = 'DELETE FROM process WHERE process_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByProcessDescription($value){
		$sql = 'DELETE FROM process WHERE process_description = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ProcessMySql 
	 */
	protected function readRow($row){
		$proces = new Proces();
		
		$proces->processId = $row['process_id'];
		$proces->processName = $row['process_name'];
		$proces->processDescription = $row['process_description'];

		return $proces;
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
	 * @return ProcessMySql 
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