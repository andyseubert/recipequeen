<?php
/**
 * Class that operate on table 'item_vendor_x'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2015-04-19 17:03
 */
class ItemVendorXMySqlDAO implements ItemVendorXDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return ItemVendorXMySql 
	 */
	public function load($itemId, $vendorId){
		$sql = 'SELECT * FROM item_vendor_x WHERE item_id = ?  AND vendor_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($itemId);
		$sqlQuery->setNumber($vendorId);

		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM item_vendor_x';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM item_vendor_x ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param itemVendorX primary key
 	 */
	public function delete($itemId, $vendorId){
		$sql = 'DELETE FROM item_vendor_x WHERE item_id = ?  AND vendor_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($itemId);
		$sqlQuery->setNumber($vendorId);

		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param ItemVendorXMySql itemVendorX
 	 */
	public function insert($itemVendorX){
		$sql = 'INSERT INTO item_vendor_x (price, part_number, item_name, item_id, vendor_id) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($itemVendorX->price);
		$sqlQuery->set($itemVendorX->partNumber);
		$sqlQuery->set($itemVendorX->itemName);

		
		$sqlQuery->setNumber($itemVendorX->itemId);

		$sqlQuery->setNumber($itemVendorX->vendorId);

		$this->executeInsert($sqlQuery);	
		//$itemVendorX->id = $id;
		//return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param ItemVendorXMySql itemVendorX
 	 */
	public function update($itemVendorX){
		$sql = 'UPDATE item_vendor_x SET price = ?, part_number = ?, item_name = ? WHERE item_id = ?  AND vendor_id = ? ';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($itemVendorX->price);
		$sqlQuery->set($itemVendorX->partNumber);
		$sqlQuery->set($itemVendorX->itemName);

		
		$sqlQuery->setNumber($itemVendorX->itemId);

		$sqlQuery->setNumber($itemVendorX->vendorId);

		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM item_vendor_x';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByPrice($value){
		$sql = 'SELECT * FROM item_vendor_x WHERE price = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPartNumber($value){
		$sql = 'SELECT * FROM item_vendor_x WHERE part_number = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByItemName($value){
		$sql = 'SELECT * FROM item_vendor_x WHERE item_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByPrice($value){
		$sql = 'DELETE FROM item_vendor_x WHERE price = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPartNumber($value){
		$sql = 'DELETE FROM item_vendor_x WHERE part_number = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByItemName($value){
		$sql = 'DELETE FROM item_vendor_x WHERE item_name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return ItemVendorXMySql 
	 */
	protected function readRow($row){
		$itemVendorX = new ItemVendorX();
		
		$itemVendorX->itemId = $row['item_id'];
		$itemVendorX->vendorId = $row['vendor_id'];
		$itemVendorX->price = $row['price'];
		$itemVendorX->partNumber = $row['part_number'];
		$itemVendorX->itemName = $row['item_name'];

		return $itemVendorX;
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
	 * @return ItemVendorXMySql 
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