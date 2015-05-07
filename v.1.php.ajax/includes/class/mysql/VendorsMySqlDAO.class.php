<?php
/**
 * Class that operate on table 'vendors'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-04-19 17:03
 */
class VendorsMySqlDAO implements VendorsDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return VendorsMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM vendors WHERE vendor_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM vendors';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM vendors ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param vendor primary key
 	 */
	public function delete($vendor_id){
		$sql = 'DELETE FROM vendors WHERE vendor_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($vendor_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param VendorsMySql vendor
 	 */
	public function insert($vendor){
		$sql = 'INSERT INTO vendors (name, address, address_2, city, state, phone) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($vendor->name);
		$sqlQuery->set($vendor->address);
		$sqlQuery->set($vendor->address2);
		$sqlQuery->set($vendor->city);
		$sqlQuery->set($vendor->state);
		$sqlQuery->set($vendor->phone);

		$id = $this->executeInsert($sqlQuery);	
		$vendor->vendorId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param VendorsMySql vendor
 	 */
	public function update($vendor){
		$sql = 'UPDATE vendors SET name = ?, address = ?, address_2 = ?, city = ?, state = ?, phone = ? WHERE vendor_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($vendor->name);
		$sqlQuery->set($vendor->address);
		$sqlQuery->set($vendor->address2);
		$sqlQuery->set($vendor->city);
		$sqlQuery->set($vendor->state);
		$sqlQuery->set($vendor->phone);

		$sqlQuery->setNumber($vendor->vendorId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM vendors';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByName($value){
		$sql = 'SELECT * FROM vendors WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAddress($value){
		$sql = 'SELECT * FROM vendors WHERE address = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByAddress2($value){
		$sql = 'SELECT * FROM vendors WHERE address_2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByCity($value){
		$sql = 'SELECT * FROM vendors WHERE city = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByState($value){
		$sql = 'SELECT * FROM vendors WHERE state = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPhone($value){
		$sql = 'SELECT * FROM vendors WHERE phone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByName($value){
		$sql = 'DELETE FROM vendors WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAddress($value){
		$sql = 'DELETE FROM vendors WHERE address = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByAddress2($value){
		$sql = 'DELETE FROM vendors WHERE address_2 = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByCity($value){
		$sql = 'DELETE FROM vendors WHERE city = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByState($value){
		$sql = 'DELETE FROM vendors WHERE state = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPhone($value){
		$sql = 'DELETE FROM vendors WHERE phone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return VendorsMySql 
	 */
	protected function readRow($row){
		$vendor = new Vendor();
		
		$vendor->vendorId = $row['vendor_id'];
		$vendor->name = $row['name'];
		$vendor->address = $row['address'];
		$vendor->address2 = $row['address_2'];
		$vendor->city = $row['city'];
		$vendor->state = $row['state'];
		$vendor->phone = $row['phone'];

		return $vendor;
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
	 * @return VendorsMySql 
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